<!-- Service Worker Registration & Push Subscription -->
<script>
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', async () => {
            try {
                const registration = await navigator.serviceWorker.register('/sw.js');
                console.log('[PWA] Service Worker registered:', registration.scope);

                // Request notification permission & subscribe to push
                if ('Notification' in window && 'PushManager' in window) {
                    const permission = await Notification.requestPermission();
                    if (permission === 'granted') {
                        await subscribeToPush(registration);
                    }
                }
            } catch (error) {
                console.error('[PWA] Service Worker registration failed:', error);
            }
        });
    }

    async function subscribeToPush(registration) {
        try {
            const vapidPublicKey = document.querySelector('meta[name="vapid-public-key"]')?.content;
            if (!vapidPublicKey) return;

            let subscription = await registration.pushManager.getSubscription();

            if (!subscription) {
                subscription = await registration.pushManager.subscribe({
                    userVisibleOnly: true,
                    applicationServerKey: urlBase64ToUint8Array(vapidPublicKey),
                });
            }

            // Send subscription to server
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
            await fetch('/push/subscribe', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: JSON.stringify(subscription),
            });

            console.log('[PWA] Push subscription saved.');
        } catch (error) {
            console.error('[PWA] Push subscription failed:', error);
        }
    }

    function urlBase64ToUint8Array(base64String) {
        const padding = '='.repeat((4 - base64String.length % 4) % 4);
        const base64 = (base64String + padding).replace(/-/g, '+').replace(/_/g, '/');
        const rawData = window.atob(base64);
        const outputArray = new Uint8Array(rawData.length);
        for (let i = 0; i < rawData.length; ++i) {
            outputArray[i] = rawData.charCodeAt(i);
        }
        return outputArray;
    }
</script>

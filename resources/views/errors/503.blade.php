<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>503 - Sedang Maintenance | LearnApp</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-gray-900">
    <div class="relative z-10 flex min-h-screen flex-col items-center justify-center overflow-hidden p-6">
        <!-- Background Grid -->
        <div class="absolute inset-0 z-0 opacity-[0.03] dark:opacity-[0.02]" style="background-image: linear-gradient(to right, #e5e7eb 1px, transparent 1px), linear-gradient(to bottom, #e5e7eb 1px, transparent 1px); background-size: 40px 40px;"></div>
        <!-- Decorative Gradients -->
        <div class="absolute -left-20 -top-20 h-72 w-72 rounded-full bg-orange-500/10 blur-3xl"></div>
        <div class="absolute -bottom-20 -right-20 h-72 w-72 rounded-full bg-orange-400/10 blur-3xl"></div>

        <div class="relative z-10 mx-auto w-full max-w-[492px] text-center">
            <h1 class="mb-8 text-4xl font-bold text-gray-800 dark:text-white/90 xl:text-6xl">ERROR</h1>

            <img src="/tailadmin/images/error/503.svg" alt="503" class="mx-auto dark:hidden" />
            <img src="/tailadmin/images/error/503-dark.svg" alt="503" class="mx-auto hidden dark:block" />

            <p class="mb-6 mt-10 text-base text-gray-600 dark:text-gray-400 sm:text-lg">
                Saat ini kami sedang dalam perbaikan. Silakan kembali lagi nanti! 🛠️
            </p>

            <a href="{{ url('/') }}"
               class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-6 py-3 text-sm font-medium text-gray-700 shadow-sm transition hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-200">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                Kembali ke Beranda
            </a>
        </div>

        <p class="absolute bottom-6 left-1/2 -translate-x-1/2 text-center text-sm text-gray-400 dark:text-gray-500">
            &copy; {{ date('Y') }} LearnApp
        </p>
    </div>
</body>
</html>

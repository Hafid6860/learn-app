<section class="space-y-6">
    <header>
        <h4 class="text-lg font-semibold text-gray-800 dark:text-white/90">
            {{ __('Hapus Akun') }}
        </h4>

        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            {{ __('Setelah akun Anda dihapus, semua data dan informasi akan dihapus secara permanen. Pastikan Anda sudah menyimpan data penting sebelum menghapus akun.') }}
        </p>
    </header>

    <div x-data="{ showDeleteModal: false }">
        <!-- Warning Alert -->
        <div class="mb-4 flex items-start gap-3 rounded-xl border border-error-200 bg-error-50 p-4 dark:border-error-500/30 dark:bg-error-500/10">
            <svg class="mt-0.5 h-5 w-5 shrink-0 text-error-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z" /></svg>
            <div>
                <h5 class="text-sm font-medium text-error-600 dark:text-error-400">Peringatan!</h5>
                <p class="mt-1 text-xs text-error-500 dark:text-error-400/80">Tindakan ini bersifat permanen dan tidak dapat dibatalkan. Semua sesi belajar dan data terkait juga akan ikut terhapus.</p>
            </div>
        </div>

        <button
            type="button"
            @click="showDeleteModal = true"
            class="inline-flex items-center justify-center gap-2 rounded-lg bg-error-500 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-error-600 sm:w-auto w-full"
        >
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
            Hapus Akun
        </button>

        <!-- Delete Confirmation Modal -->
        <div x-show="showDeleteModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-[99999] flex items-center justify-center p-4" x-cloak>
            <div class="fixed inset-0 bg-gray-900/50 dark:bg-gray-900/70" @click="showDeleteModal = false"></div>
            <div class="relative w-full max-w-md rounded-2xl bg-white p-6 shadow-xl dark:bg-gray-900">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="flex flex-col items-center text-center">
                        <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-error-50 dark:bg-error-500/15">
                            <svg class="h-7 w-7 text-error-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z" /></svg>
                        </div>
                        <h3 class="mb-2 text-lg font-semibold text-gray-800 dark:text-white/90">Hapus Akun Anda?</h3>
                        <p class="mb-6 text-sm text-gray-500 dark:text-gray-400">Masukkan password Anda untuk mengkonfirmasi penghapusan akun secara permanen.</p>

                        <div class="mb-6 w-full">
                            <input
                                id="password"
                                name="password"
                                type="password"
                                class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"
                                placeholder="Masukkan password..."
                            />
                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                        </div>

                        <div class="flex w-full items-center gap-3">
                            <button type="button" @click="showDeleteModal = false" class="flex-1 rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">Batal</button>
                            <button type="submit" class="flex-1 rounded-lg bg-error-500 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-error-600">Ya, Hapus Akun</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

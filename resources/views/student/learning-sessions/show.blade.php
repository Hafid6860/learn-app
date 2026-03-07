<x-app-layout>
    <div class="py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-6">

            <!-- Flash Messages -->
            @if(session('success'))
                <div class="flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 p-4 dark:border-green-500/30 dark:bg-green-500/10" x-data="{ show: true }" x-show="show" x-transition>
                    <svg class="h-5 w-5 shrink-0 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <p class="flex-1 text-sm font-medium text-green-700 dark:text-green-400">{{ session('success') }}</p>
                    <button @click="show = false" class="text-green-400 hover:text-green-600"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></button>
                </div>
            @endif
            @if(session('info'))
                <div class="flex items-center gap-3 rounded-xl border border-blue-200 bg-blue-50 p-4 dark:border-blue-500/30 dark:bg-blue-500/10" x-data="{ show: true }" x-show="show" x-transition>
                    <svg class="h-5 w-5 shrink-0 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <p class="flex-1 text-sm font-medium text-blue-700 dark:text-blue-400">{{ session('info') }}</p>
                    <button @click="show = false" class="text-blue-400 hover:text-blue-600"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></button>
                </div>
            @endif

            <!-- Breadcrumb -->
            <nav class="flex items-center gap-1.5 text-sm">
                <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-brand-500 dark:text-gray-400 transition-colors">Dashboard</a>
                <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                <a href="{{ route('learning-sessions.index') }}" class="text-gray-500 hover:text-brand-500 dark:text-gray-400 transition-colors">Sesi Belajar</a>
                <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                <span class="font-medium text-gray-800 dark:text-white/90">Pertemuan {{ $learningSession->session_number }}</span>
            </nav>

            <!-- Session Header -->
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="p-5 sm:p-6">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex items-center gap-4">
                            <span class="flex h-14 w-14 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-brand-400 to-brand-600 text-xl font-bold text-white shadow-lg">
                                {{ $learningSession->session_number }}
                            </span>
                            <div>
                                <h1 class="text-xl font-bold text-gray-800 dark:text-white/90">{{ $learningSession->title }}</h1>
                                <div class="mt-1 flex flex-wrap items-center gap-2 text-sm text-gray-500 dark:text-gray-400">
                                    <span class="flex items-center gap-1">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                        {{ $learningSession->meeting_date ? \Carbon\Carbon::parse($learningSession->meeting_date)->format('d M Y') : '-' }}
                                    </span>
                                    <span class="text-gray-300 dark:text-gray-600">•</span>
                                    <span>Pertemuan ke-{{ $learningSession->session_number }}</span>
                                </div>
                            </div>
                        </div>
                        @php $isCompleted = $learningSession->isCompletedBy(auth()->user()); @endphp
                        @if($isCompleted)
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-4 py-2 text-sm font-medium text-green-600 dark:bg-green-500/10 dark:text-green-400">
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                Sudah Selesai
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-brand-50 px-4 py-2 text-sm font-medium text-brand-600 dark:bg-brand-500/10 dark:text-brand-400">
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" /></svg>
                                Dalam Progress
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Content Cards -->
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                <!-- Left: Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Summary -->
                    @if($learningSession->summary)
                    <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                        <div class="flex items-center gap-2 border-b border-gray-200 px-5 py-4 dark:border-gray-800 sm:px-6">
                            <svg class="h-5 w-5 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                            <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Ringkasan Materi</h3>
                        </div>
                        <div class="p-5 sm:p-6">
                            <div class="prose max-w-none text-sm text-gray-600 dark:text-gray-400 dark:prose-invert">
                                {!! $learningSession->summary !!}
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Video -->
                    @if($learningSession->youtube_embed_url)
                    <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                        <div class="flex items-center gap-2 border-b border-gray-200 px-5 py-4 dark:border-gray-800 sm:px-6">
                            <svg class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" /><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Video Pembelajaran</h3>
                        </div>
                        <div class="p-5 sm:p-6">
                            <div class="overflow-hidden rounded-xl border border-gray-200 dark:border-gray-800">
                                <iframe src="{{ $learningSession->youtube_embed_url }}"
                                        class="aspect-video w-full"
                                        frameborder="0"
                                        allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Right: Sidebar -->
                <div class="space-y-6">
                    <!-- Source Code -->
                    @if($learningSession->source_code_url)
                    <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                        <div class="flex items-center gap-2 border-b border-gray-200 px-5 py-4 dark:border-gray-800 sm:px-6">
                            <svg class="h-5 w-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /></svg>
                            <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Source Code</h3>
                        </div>
                        <div class="p-5 sm:p-6">
                            <a href="{{ $learningSession->source_code_url }}" target="_blank"
                               class="flex items-center gap-3 rounded-xl border border-gray-200 bg-gray-50 p-4 transition hover:bg-gray-100 dark:border-gray-800 dark:bg-white/[0.02] dark:hover:bg-white/[0.05]">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-purple-50 dark:bg-purple-500/10">
                                    <svg class="h-5 w-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="text-sm font-medium text-gray-800 dark:text-white/90">Lihat Source Code</p>
                                    <p class="truncate text-xs text-gray-500 dark:text-gray-400">{{ $learningSession->source_code_url }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endif

                    <!-- Mark Complete / Completed -->
                    @can('complete', $learningSession)
                    <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                        <div class="p-5 sm:p-6">
                            @if(!$isCompleted)
                                <div class="text-center" x-data="{ showConfirm: false }">
                                    <div class="mb-4 flex justify-center">
                                        <div class="flex h-14 w-14 items-center justify-center rounded-full bg-brand-50 dark:bg-brand-500/10">
                                            <svg class="h-7 w-7 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                        </div>
                                    </div>
                                    <h4 class="mb-1 text-sm font-semibold text-gray-800 dark:text-white/90">Sudah selesai belajar?</h4>
                                    <p class="mb-4 text-xs text-gray-500 dark:text-gray-400">Tandai sesi ini sebagai selesai untuk membuka sesi berikutnya</p>
                                    <button @click="showConfirm = true"
                                            class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-brand-600">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                        Tandai Selesai
                                    </button>

                                    <!-- Confirmation Modal -->
                                    <div x-show="showConfirm" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-[99999] flex items-center justify-center p-4" x-cloak>
                                        <div class="fixed inset-0 bg-gray-900/50 dark:bg-gray-900/70" @click="showConfirm = false"></div>
                                        <div class="relative w-full max-w-sm rounded-2xl bg-white p-6 shadow-xl dark:bg-gray-900">
                                            <div class="flex flex-col items-center text-center">
                                                <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-green-50 dark:bg-green-500/15">
                                                    <svg class="h-7 w-7 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                                </div>
                                                <h3 class="mb-2 text-lg font-semibold text-gray-800 dark:text-white/90">Tandai Selesai?</h3>
                                                <p class="mb-6 text-sm text-gray-500 dark:text-gray-400">Setelah ditandai selesai, sesi berikutnya akan terbuka. Lanjutkan?</p>
                                                <div class="flex items-center gap-3">
                                                    <button @click="showConfirm = false" class="rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">Batal</button>
                                                    <form action="{{ route('learning-sessions.complete', $learningSession) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="rounded-lg bg-green-500 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-green-600">Ya, Selesai</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="text-center">
                                    <div class="mb-4 flex justify-center">
                                        <div class="flex h-14 w-14 items-center justify-center rounded-full bg-green-50 dark:bg-green-500/10">
                                            <svg class="h-7 w-7 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                        </div>
                                    </div>
                                    <h4 class="mb-1 text-sm font-semibold text-green-600 dark:text-green-400">Sesi Selesai! 🎉</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Kamu sudah menyelesaikan sesi ini. Hebat!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    @endcan
                </div>
            </div>

            <!-- Back Button -->
            <div>
                <a href="{{ route('learning-sessions.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5M12 19L5 12l7-7" /></svg>
                    Kembali ke Daftar Sesi
                </a>
            </div>

        </div>
    </div>
</x-app-layout>

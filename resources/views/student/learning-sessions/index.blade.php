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
            @if(session('error'))
                <div class="flex items-center gap-3 rounded-xl border border-red-200 bg-red-50 p-4 dark:border-red-500/30 dark:bg-red-500/10" x-data="{ show: true }" x-show="show" x-transition>
                    <svg class="h-5 w-5 shrink-0 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <p class="flex-1 text-sm font-medium text-red-700 dark:text-red-400">{{ session('error') }}</p>
                    <button @click="show = false" class="text-red-400 hover:text-red-600"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></button>
                </div>
            @endif

            <!-- Page Header -->
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-xl font-bold text-gray-800 dark:text-white/90 sm:text-2xl">Sesi Belajar</h1>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Daftar semua materi pembelajaran kamu</p>
                </div>
            </div>

            <!-- Sessions Grid -->
            @if($sessions->isEmpty())
                <div class="flex flex-col items-center gap-4 rounded-2xl border border-gray-200 bg-white p-12 text-center dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-800">
                        <svg class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                    </div>
                    <div>
                        <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Belum ada sesi belajar</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Sesi belajar akan muncul di sini ketika admin sudah membuatnya</p>
                    </div>
                </div>
            @else
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($sessions as $learningSession)
                        @php
                            $isUnlocked = $learningSession->isUnlockedFor(auth()->user());
                            $isCompleted = auth()->user()->completedSessions->contains($learningSession->id);
                        @endphp

                        <div class="group relative overflow-hidden rounded-2xl border transition-all duration-300
                            {{ $isCompleted
                                ? 'border-green-200 bg-white hover:shadow-lg hover:shadow-green-500/5 dark:border-green-500/20 dark:bg-white/[0.03]'
                                : ($isUnlocked
                                    ? 'border-gray-200 bg-white hover:-translate-y-1 hover:shadow-lg dark:border-gray-800 dark:bg-white/[0.03]'
                                    : 'border-gray-200 bg-gray-50/50 dark:border-gray-800 dark:bg-white/[0.01]') }}">

                            <!-- Status Ribbon -->
                            @if($isCompleted)
                                <div class="absolute right-3 top-3 z-10">
                                    <span class="flex h-7 w-7 items-center justify-center rounded-full bg-green-500 text-white shadow-sm">
                                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                    </span>
                                </div>
                            @elseif(!$isUnlocked)
                                <div class="absolute right-3 top-3 z-10">
                                    <span class="flex h-7 w-7 items-center justify-center rounded-full bg-gray-300 text-white dark:bg-gray-600">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                                    </span>
                                </div>
                            @endif

                            <div class="p-5 {{ !$isUnlocked ? 'opacity-50' : '' }}">
                                <!-- Session Number + Date -->
                                <div class="mb-3 flex items-center gap-3">
                                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl text-sm font-bold
                                        {{ $isCompleted ? 'bg-green-50 text-green-600 dark:bg-green-500/10' : ($isUnlocked ? 'bg-brand-50 text-brand-600 dark:bg-brand-500/10' : 'bg-gray-100 text-gray-400') }}">
                                        {{ $learningSession->session_number }}
                                    </span>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-xs font-medium text-gray-400 dark:text-gray-500">Pertemuan {{ $learningSession->session_number }}</p>
                                        <p class="text-xs text-gray-400">{{ $learningSession->meeting_date ? \Carbon\Carbon::parse($learningSession->meeting_date)->format('d M Y') : '-' }}</p>
                                    </div>
                                </div>

                                <!-- Title -->
                                <h3 class="mb-3 text-base font-semibold text-gray-800 dark:text-white/90 line-clamp-2">{{ $learningSession->title }}</h3>

                                <!-- Status Badge -->
                                <div class="mb-4">
                                    @if($isCompleted)
                                        <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2.5 py-1 text-xs font-medium text-green-600 dark:bg-green-500/10 dark:text-green-400">
                                            <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                            Selesai
                                        </span>
                                    @elseif($isUnlocked)
                                        <span class="inline-flex items-center gap-1 rounded-full bg-brand-50 px-2.5 py-1 text-xs font-medium text-brand-600 dark:bg-brand-500/10 dark:text-brand-400">
                                            <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" /></svg>
                                            Dalam Progress
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 rounded-full bg-gray-100 px-2.5 py-1 text-xs font-medium text-gray-500 dark:bg-gray-800 dark:text-gray-400">
                                            <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                                            Terkunci
                                        </span>
                                    @endif
                                </div>

                                <!-- Action Button -->
                                @if($isUnlocked)
                                    <a href="{{ route('learning-sessions.show', $learningSession) }}"
                                       class="inline-flex w-full items-center justify-center gap-2 rounded-lg {{ $isCompleted ? 'bg-green-50 text-green-600 hover:bg-green-100 dark:bg-green-500/10 dark:text-green-400 dark:hover:bg-green-500/20' : 'bg-brand-500 text-white hover:bg-brand-600' }} px-4 py-2.5 text-sm font-medium transition-colors">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                        {{ $isCompleted ? 'Lihat Kembali' : 'Mulai Belajar' }}
                                    </a>
                                @else
                                    <button disabled class="inline-flex w-full cursor-not-allowed items-center justify-center gap-2 rounded-lg bg-gray-100 px-4 py-2.5 text-sm font-medium text-gray-400 dark:bg-gray-800">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                                        Terkunci
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $sessions->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>

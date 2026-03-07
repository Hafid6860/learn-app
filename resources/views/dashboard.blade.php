<x-app-layout>
    <div class="py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-6">

            <!-- Welcome Card -->
            <div class="relative overflow-hidden rounded-2xl border border-gray-200 bg-white p-6 sm:p-8 dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="relative z-10">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-br from-brand-400 to-brand-600 text-lg font-bold text-white shadow-lg">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </span>
                        <div>
                            <h1 class="text-xl font-bold text-gray-800 sm:text-2xl dark:text-white/90">Selamat datang, {{ Auth::user()->name }}! 👋</h1>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Senang melihatmu kembali. Mari lanjutkan belajar hari ini!</p>
                        </div>
                    </div>
                </div>
                <!-- Decorative gradient -->
                <div class="absolute -right-6 -top-6 h-32 w-32 rounded-full bg-brand-500/10 blur-2xl"></div>
                <div class="absolute -bottom-8 -right-12 h-40 w-40 rounded-full bg-brand-400/5 blur-3xl"></div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 sm:gap-6">
                <!-- Total Sesi -->
                <div class="group rounded-2xl border border-gray-200 bg-white p-5 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Sesi</p>
                            <h3 class="mt-2 text-3xl font-bold text-gray-800 dark:text-white/90">{{ $totalSessions }}</h3>
                        </div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-50 text-brand-500 transition-transform duration-300 group-hover:scale-110 dark:bg-brand-500/10">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                        </div>
                    </div>
                </div>

                <!-- Selesai -->
                <div class="group rounded-2xl border border-gray-200 bg-white p-5 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Selesai</p>
                            <h3 class="mt-2 text-3xl font-bold text-green-600 dark:text-green-400">{{ $completedSessions }}</h3>
                        </div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-50 text-green-500 transition-transform duration-300 group-hover:scale-110 dark:bg-green-500/10">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                    </div>
                </div>

                <!-- Progress -->
                <div class="group rounded-2xl border border-gray-200 bg-white p-5 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Progress</p>
                            <h3 class="mt-2 text-3xl font-bold text-brand-600 dark:text-brand-400">{{ number_format($progressPercentage, 0) }}%</h3>
                        </div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-50 text-purple-500 transition-transform duration-300 group-hover:scale-110 dark:bg-purple-500/10">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" /></svg>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="h-2 w-full overflow-hidden rounded-full bg-gray-100 dark:bg-gray-800">
                            <div class="h-full rounded-full bg-gradient-to-r from-brand-400 to-brand-600 transition-all duration-1000"
                                 style="width: {{ $progressPercentage }}%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Sessions -->
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="flex items-center justify-between border-b border-gray-200 px-5 py-4 dark:border-gray-800 sm:px-6">
                    <h3 class="flex items-center gap-2 text-base font-medium text-gray-800 dark:text-white/90">
                        <svg class="h-5 w-5 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        Sesi Belajar Terbaru
                    </h3>
                    <a href="{{ route('learning-sessions.index') }}" class="text-sm font-medium text-brand-500 transition-colors hover:text-brand-600">
                        Lihat Semua →
                    </a>
                </div>

                @if($recentSessions->isEmpty())
                    <div class="flex flex-col items-center gap-3 p-8 text-center">
                        <div class="flex h-14 w-14 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-800">
                            <svg class="h-7 w-7 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                        </div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Belum ada sesi belajar</p>
                    </div>
                @else
                    <div class="divide-y divide-gray-100 dark:divide-gray-800">
                        @foreach($recentSessions as $session)
                            @php
                                $isCompleted = auth()->user()->completedSessions->contains($session->id);
                                $isUnlocked = $session->isUnlockedFor(auth()->user());
                            @endphp
                            <a href="{{ $isUnlocked ? route('learning-sessions.show', $session) : '#' }}"
                               class="flex items-center gap-4 px-5 py-4 transition-colors {{ $isUnlocked ? 'hover:bg-gray-50 dark:hover:bg-white/[0.02]' : 'opacity-60 cursor-not-allowed' }} sm:px-6">
                                <!-- Session Number -->
                                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl text-sm font-bold
                                    {{ $isCompleted ? 'bg-green-50 text-green-600 dark:bg-green-500/10 dark:text-green-400' : ($isUnlocked ? 'bg-brand-50 text-brand-600 dark:bg-brand-500/10 dark:text-brand-400' : 'bg-gray-100 text-gray-400 dark:bg-gray-800') }}">
                                    @if($isCompleted)
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                    @elseif(!$isUnlocked)
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                                    @else
                                        {{ $session->session_number }}
                                    @endif
                                </span>
                                <!-- Info -->
                                <div class="min-w-0 flex-1">
                                    <p class="truncate text-sm font-medium text-gray-800 dark:text-white/90">{{ $session->title }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Pertemuan {{ $session->session_number }} • {{ $session->meeting_date ? \Carbon\Carbon::parse($session->meeting_date)->format('d M Y') : '-' }}</p>
                                </div>
                                <!-- Status Badge -->
                                @if($isCompleted)
                                    <span class="hidden shrink-0 rounded-full bg-green-50 px-2.5 py-1 text-xs font-medium text-green-600 sm:inline-flex dark:bg-green-500/10 dark:text-green-400">Selesai</span>
                                @elseif($isUnlocked)
                                    <span class="hidden shrink-0 rounded-full bg-brand-50 px-2.5 py-1 text-xs font-medium text-brand-600 sm:inline-flex dark:bg-brand-500/10 dark:text-brand-400">Dalam Progress</span>
                                @else
                                    <span class="hidden shrink-0 rounded-full bg-gray-100 px-2.5 py-1 text-xs font-medium text-gray-500 sm:inline-flex dark:bg-gray-800 dark:text-gray-400">Terkunci</span>
                                @endif
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>

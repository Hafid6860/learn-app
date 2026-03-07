<x-admin-layout>
    <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
        <!-- Page Header -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90">Dashboard</h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Selamat datang, {{ Auth::user()->name }}! Berikut ringkasan data terbaru.</p>
        </div>

        <!-- Metric Cards -->
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4 md:gap-6">
            <!-- Total Siswa -->
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Total Siswa</span>
                        <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">
                            {{ $totalStudents }}
                        </h4>
                    </div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-50 dark:bg-brand-500/10">
                        <svg class="h-6 w-6 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Sesi -->
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Total Sesi Belajar</span>
                        <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">
                            {{ $totalSessions }}
                        </h4>
                    </div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-50 dark:bg-green-500/10">
                        <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Sesi Selesai -->
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Sesi Selesai</span>
                        <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">
                            {{ $totalCompleted }}
                        </h4>
                    </div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-50 dark:bg-purple-500/10">
                        <svg class="h-6 w-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Tingkat Penyelesaian -->
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Tingkat Penyelesaian</span>
                        <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">
                            {{ $completionRate }}%
                        </h4>
                    </div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-orange-50 dark:bg-orange-500/10">
                        <svg class="h-6 w-6 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tables Section -->
        <div class="mt-6 grid grid-cols-1 gap-4 xl:grid-cols-2 md:gap-6">
            <!-- Recent Students -->
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="flex items-center justify-between border-b border-gray-200 px-5 py-4 dark:border-gray-800 sm:px-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Siswa Terbaru</h3>
                    <a href="{{ route('admin.students.index') }}" class="text-sm font-medium text-brand-500 hover:text-brand-600">Lihat Semua</a>
                </div>
                <div class="p-5 sm:p-6">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-gray-100 dark:border-gray-800">
                                    <th class="pb-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">Nama</th>
                                    <th class="pb-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">Paket</th>
                                    <th class="pb-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">Total Sesi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentStudents as $student)
                                    <tr class="border-b border-gray-100 last:border-0 dark:border-gray-800">
                                        <td class="py-3">
                                            <div class="flex items-center gap-3">
                                                <span class="flex h-9 w-9 items-center justify-center rounded-full bg-brand-50 text-sm font-semibold text-brand-500 dark:bg-brand-500/10">
                                                    {{ strtoupper(substr($student->name, 0, 1)) }}
                                                </span>
                                                <div>
                                                    <p class="text-sm font-medium text-gray-800 dark:text-white/90">{{ $student->name }}</p>
                                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $student->email }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-3">
                                            <span class="inline-flex rounded-full bg-brand-50 px-2.5 py-0.5 text-xs font-medium text-brand-600 dark:bg-brand-500/10 dark:text-brand-400">
                                                {{ $student->package_name ?? '-' }}
                                            </span>
                                        </td>
                                        <td class="py-3 text-sm text-gray-600 dark:text-gray-400">
                                            {{ $student->total_sessions ?? 0 }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="py-6 text-center text-sm text-gray-500 dark:text-gray-400">Belum ada siswa terdaftar</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Recent Sessions -->
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="flex items-center justify-between border-b border-gray-200 px-5 py-4 dark:border-gray-800 sm:px-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Sesi Belajar Terbaru</h3>
                </div>
                <div class="p-5 sm:p-6">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-gray-100 dark:border-gray-800">
                                    <th class="pb-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">Judul</th>
                                    <th class="pb-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">Siswa</th>
                                    <th class="pb-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentSessions as $session)
                                    <tr class="border-b border-gray-100 last:border-0 dark:border-gray-800">
                                        <td class="py-3">
                                            <div>
                                                <p class="text-sm font-medium text-gray-800 dark:text-white/90">{{ $session->title }}</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">Sesi #{{ $session->session_number }}</p>
                                            </div>
                                        </td>
                                        <td class="py-3 text-sm text-gray-600 dark:text-gray-400">
                                            {{ $session->user->name ?? '-' }}
                                        </td>
                                        <td class="py-3 text-sm text-gray-600 dark:text-gray-400">
                                            {{ $session->meeting_date ? \Carbon\Carbon::parse($session->meeting_date)->format('d M Y') : '-' }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="py-6 text-center text-sm text-gray-500 dark:text-gray-400">Belum ada sesi belajar</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

<x-admin-layout>

    <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">

        <!-- Breadcrumb -->
        <nav class="mb-5 flex items-center gap-1.5 text-sm">
            <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-brand-500 dark:text-gray-400 dark:hover:text-brand-400 transition-colors">Dashboard</a>
            <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
            <a href="{{ route('admin.students.index') }}" class="text-gray-500 hover:text-brand-500 dark:text-gray-400 dark:hover:text-brand-400 transition-colors">Siswa</a>
            <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
            <span class="font-medium text-gray-800 dark:text-white/90">{{ $student->name }}</span>
        </nav>

        <!-- Student Info Card -->
        <div class="mb-6 rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] sm:p-6">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center gap-4">
                    <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-brand-500 text-lg font-bold text-white">
                        {{ strtoupper(substr($student->name, 0, 1)) }}
                    </span>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white/90">{{ $student->name }}</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $student->email }}</p>
                    </div>
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-brand-50 px-3 py-1.5 text-xs font-medium text-brand-600 dark:bg-brand-500/10 dark:text-brand-400">
                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                        {{ $student->package_name ?? 'Belum ada paket' }}
                    </span>
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-3 py-1.5 text-xs font-medium text-green-600 dark:bg-green-500/10 dark:text-green-400">
                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                        {{ $createdSessions }} / {{ $totalSessions }} Sesi Dibuat
                    </span>
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-purple-50 px-3 py-1.5 text-xs font-medium text-purple-600 dark:bg-purple-500/10 dark:text-purple-400">
                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        {{ $completedCount }} Selesai
                    </span>
                </div>
            </div>
            <!-- Progress Bar -->
            @if($totalSessions > 0)
                <div class="mt-4">
                    <div class="flex items-center justify-between text-xs text-gray-500 dark:text-gray-400 mb-1.5">
                        <span>Progress Sesi</span>
                        <span>{{ $createdSessions }} / {{ $totalSessions }}</span>
                    </div>
                    <div class="h-2 w-full overflow-hidden rounded-full bg-gray-100 dark:bg-gray-800">
                        <div class="h-full rounded-full bg-gradient-to-r from-brand-400 to-brand-600 transition-all duration-500"
                             style="width: {{ min(($createdSessions / $totalSessions) * 100, 100) }}%"></div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Page Header -->
        <div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Sesi Belajar</h3>
            <a href="{{ route('admin.students.learning-sessions.create', $student) }}"
               class="inline-flex items-center gap-2 rounded-lg bg-brand-500 hover:bg-brand-600 px-5 py-2.5 text-sm font-medium text-white transition shadow-theme-xs">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14" /></svg>
                Tambah Sesi
            </a>
        </div>

        <!-- Success Alert -->
        @if(session('success'))
            <div class="mb-5 flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 p-4 dark:border-green-500/20 dark:bg-green-500/10">
                <svg class="h-5 w-5 shrink-0 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <p class="text-sm font-medium text-green-700 dark:text-green-400">{{ session('success') }}</p>
            </div>
        @endif

        <!-- Table Card -->
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="max-w-full overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-100 bg-gray-50/50 dark:border-gray-800 dark:bg-white/[0.01]">
                            <th class="px-5 py-3.5 text-left text-theme-sm font-medium text-gray-500 dark:text-gray-400 sm:px-6">#</th>
                            <th class="px-5 py-3.5 text-left text-theme-sm font-medium text-gray-500 dark:text-gray-400 sm:px-6">Judul</th>
                            <th class="px-5 py-3.5 text-left text-theme-sm font-medium text-gray-500 dark:text-gray-400 sm:px-6">Tanggal Pertemuan</th>
                            <th class="px-5 py-3.5 text-left text-theme-sm font-medium text-gray-500 dark:text-gray-400 sm:px-6">Status</th>
                            <th class="px-5 py-3.5 text-left text-theme-sm font-medium text-gray-500 dark:text-gray-400 sm:px-6">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                        @forelse($sessions as $session)
                            <tr class="group transition-colors hover:bg-gray-50 dark:hover:bg-white/[0.02]">
                                <!-- Session Number -->
                                <td class="px-5 py-4 sm:px-6">
                                    <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-gray-100 text-sm font-semibold text-gray-700 dark:bg-white/5 dark:text-gray-300">
                                        {{ $session->session_number }}
                                    </span>
                                </td>
                                <!-- Title -->
                                <td class="px-5 py-4 sm:px-6">
                                    <p class="text-sm font-medium text-gray-800 dark:text-white/90">{{ $session->title }}</p>
                                </td>
                                <!-- Meeting Date -->
                                <td class="px-5 py-4 sm:px-6">
                                    <div class="flex items-center gap-1.5">
                                        <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                        <span class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ $session->meeting_date ? \Carbon\Carbon::parse($session->meeting_date)->format('d M Y') : '-' }}
                                        </span>
                                    </div>
                                </td>
                                <!-- Status -->
                                <td class="px-5 py-4 sm:px-6">
                                    @if($session->isCompletedBy($student))
                                        <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2.5 py-1 text-xs font-medium text-green-600 dark:bg-green-500/10 dark:text-green-400">
                                            <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                            Selesai
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 rounded-full bg-orange-50 px-2.5 py-1 text-xs font-medium text-orange-600 dark:bg-orange-500/10 dark:text-orange-400">
                                            <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" /></svg>
                                            Belum Selesai
                                        </span>
                                    @endif
                                </td>
                                <!-- Actions -->
                                <td class="px-5 py-4 sm:px-6">
                                    <div class="flex items-center gap-1.5">
                                        <a href="{{ route('admin.students.learning-sessions.show', [$student, $session]) }}"
                                           class="inline-flex h-8 w-8 items-center justify-center rounded-lg text-blue-500 transition-colors hover:bg-blue-50 dark:hover:bg-blue-500/10"
                                           title="Lihat Detail">
                                            <svg class="h-[18px] w-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                        </a>
                                        <a href="{{ route('admin.students.learning-sessions.edit', [$student, $session]) }}"
                                           class="inline-flex h-8 w-8 items-center justify-center rounded-lg text-orange-500 transition-colors hover:bg-orange-50 dark:hover:bg-orange-500/10"
                                           title="Edit">
                                            <svg class="h-[18px] w-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                        </a>
                                        <div x-data="{ showDelete: false }">
                                            <button @click="showDelete = true"
                                                    class="inline-flex h-8 w-8 items-center justify-center rounded-lg text-red-500 transition-colors hover:bg-red-50 dark:hover:bg-red-500/10"
                                                    title="Hapus">
                                                <svg class="h-[18px] w-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                            </button>
                                            <div x-show="showDelete" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-[99999] flex items-center justify-center p-4" x-cloak>
                                                <div class="fixed inset-0 bg-gray-900/50 dark:bg-gray-900/70" @click="showDelete = false"></div>
                                                <div class="relative w-full max-w-md rounded-2xl bg-white p-6 shadow-xl dark:bg-gray-900">
                                                    <div class="flex flex-col items-center text-center">
                                                        <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-error-50 dark:bg-error-500/15">
                                                            <svg class="h-7 w-7 text-error-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z" /></svg>
                                                        </div>
                                                        <h3 class="mb-2 text-lg font-semibold text-gray-800 dark:text-white/90">Hapus Sesi Belajar?</h3>
                                                        <p class="mb-6 text-sm text-gray-500 dark:text-gray-400">Apakah kamu yakin ingin menghapus sesi <strong>"{{ $session->title }}"</strong>? Tindakan ini tidak bisa dibatalkan.</p>
                                                        <div class="flex items-center gap-3">
                                                            <button @click="showDelete = false" class="rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">Batal</button>
                                                            <form action="{{ route('admin.students.learning-sessions.destroy', [$student, $session]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="rounded-lg bg-error-500 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-error-600">Ya, Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-5 py-8 text-center sm:px-6">
                                    <div class="flex flex-col items-center gap-2">
                                        <svg class="h-10 w-10 text-gray-300 dark:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Belum ada sesi belajar</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($sessions->hasPages())
                <div class="border-t border-gray-200 px-5 py-4 dark:border-gray-800 sm:px-6">
                    {{ $sessions->links() }}
                </div>
            @endif
        </div>

    </div>
</x-admin-layout>

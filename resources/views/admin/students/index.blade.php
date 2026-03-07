<x-admin-layout>

    <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">

        <!-- Page Header -->
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90">Daftar Siswa</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola semua siswa terdaftar</p>
            </div>
            <a href="{{ route('admin.students.create') }}"
               class="inline-flex items-center gap-2 rounded-lg bg-brand-500 hover:bg-brand-600 px-5 py-2.5 text-sm font-medium text-white transition shadow-theme-xs">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14" />
                </svg>
                Tambah Siswa
            </a>
        </div>

        <!-- Info Summary Bar -->
        <div class="mb-6 flex flex-wrap items-center gap-3">
            <span class="inline-flex items-center gap-2 rounded-full bg-brand-50 px-4 py-1.5 text-sm font-medium text-brand-600 dark:bg-brand-500/10 dark:text-brand-400">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                {{ $totalStudents }} Siswa
            </span>
            <span class="inline-flex items-center gap-2 rounded-full bg-green-50 px-4 py-1.5 text-sm font-medium text-green-600 dark:bg-green-500/10 dark:text-green-400">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                {{ $totalLearningSessions }} Sesi Belajar
            </span>
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
            <!-- Table Header with Search -->
            <div class="flex flex-col gap-4 border-b border-gray-200 p-5 dark:border-gray-800 sm:flex-row sm:items-center sm:justify-between sm:p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                    Semua Siswa
                </h3>
                <form method="GET" class="relative w-full sm:w-72">
                    <span class="pointer-events-none absolute left-3.5 top-1/2 -translate-y-1/2">
                        <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    </span>
                    <input type="text" name="search" placeholder="Cari nama atau email..."
                           value="{{ request('search') }}"
                           class="h-10 w-full rounded-lg border border-gray-200 bg-transparent py-2 pl-10 pr-4 text-sm text-gray-700 placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-gray-500 dark:focus:border-brand-800">
                </form>
            </div>

            <!-- Table -->
            <div class="max-w-full overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-100 dark:border-gray-800">
                            <th class="px-5 py-3.5 text-left text-theme-sm font-medium text-gray-500 dark:text-gray-400 sm:px-6">Siswa</th>
                            <th class="px-5 py-3.5 text-left text-theme-sm font-medium text-gray-500 dark:text-gray-400 sm:px-6">WhatsApp</th>
                            <th class="px-5 py-3.5 text-left text-theme-sm font-medium text-gray-500 dark:text-gray-400 sm:px-6">Paket</th>
                            <th class="px-5 py-3.5 text-left text-theme-sm font-medium text-gray-500 dark:text-gray-400 sm:px-6">Sesi</th>
                            <th class="px-5 py-3.5 text-left text-theme-sm font-medium text-gray-500 dark:text-gray-400 sm:px-6">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                        @forelse($students as $student)
                            <tr class="group transition-colors hover:bg-gray-50 dark:hover:bg-white/[0.02]">
                                <!-- Student Name + Email -->
                                <td class="px-5 py-4 sm:px-6">
                                    <div class="flex items-center gap-3">
                                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-500 text-sm font-semibold text-white">
                                            {{ strtoupper(substr($student->name, 0, 1)) }}
                                        </span>
                                        <div class="min-w-0">
                                            <p class="truncate text-sm font-medium text-gray-800 dark:text-white/90">{{ $student->name }}</p>
                                            <p class="truncate text-xs text-gray-500 dark:text-gray-400">{{ $student->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <!-- WhatsApp -->
                                <td class="px-5 py-4 sm:px-6">
                                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $student->whatsapp_number ?? '-' }}</p>
                                </td>
                                <!-- Package -->
                                <td class="px-5 py-4 sm:px-6">
                                    @if($student->package_name)
                                        <span class="inline-flex rounded-full bg-brand-50 px-2.5 py-1 text-xs font-medium text-brand-600 dark:bg-brand-500/10 dark:text-brand-400">
                                            {{ $student->package_name }}
                                        </span>
                                    @else
                                        <span class="text-sm text-gray-400">-</span>
                                    @endif
                                </td>
                                <!-- Session Count -->
                                <td class="px-5 py-4 sm:px-6">
                                    <span class="inline-flex items-center gap-1.5 text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <svg class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                                        {{ $student->total_sessions ?? 0 }}
                                    </span>
                                </td>
                                <!-- Actions -->
                                <td class="px-5 py-4 sm:px-6">
                                    <div class="flex items-center gap-1.5">
                                        <a href="{{ route('admin.students.learning-sessions.index', $student) }}"
                                           class="inline-flex h-8 w-8 items-center justify-center rounded-lg text-green-500 transition-colors hover:bg-green-50 dark:hover:bg-green-500/10"
                                           title="Sesi Belajar">
                                            <svg class="h-[18px] w-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                                        </a>
                                        <a href="{{ route('admin.students.show', $student) }}"
                                           class="inline-flex h-8 w-8 items-center justify-center rounded-lg text-blue-500 transition-colors hover:bg-blue-50 dark:hover:bg-blue-500/10"
                                           title="Lihat Detail">
                                            <svg class="h-[18px] w-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                        </a>
                                        <a href="{{ route('admin.students.edit', $student) }}"
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
                                                        <h3 class="mb-2 text-lg font-semibold text-gray-800 dark:text-white/90">Hapus Siswa?</h3>
                                                        <p class="mb-6 text-sm text-gray-500 dark:text-gray-400">Apakah kamu yakin ingin menghapus <strong>{{ $student->name }}</strong>? Semua data sesi belajar juga akan ikut terhapus.</p>
                                                        <div class="flex items-center gap-3">
                                                            <button @click="showDelete = false" class="rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">Batal</button>
                                                            <form action="{{ route('admin.students.destroy', $student) }}" method="POST">
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
                                        <svg class="h-10 w-10 text-gray-300 dark:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Belum ada siswa terdaftar</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($students->hasPages())
                <div class="border-t border-gray-200 px-5 py-4 dark:border-gray-800 sm:px-6">
                    {{ $students->links() }}
                </div>
            @endif
        </div>

    </div>
</x-admin-layout>

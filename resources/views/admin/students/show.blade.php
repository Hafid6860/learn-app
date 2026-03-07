<x-admin-layout>
    <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">

        <!-- Breadcrumb -->
        <nav class="mb-5 flex items-center gap-1.5 text-sm">
            <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-brand-500 dark:text-gray-400 transition-colors">Dashboard</a>
            <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
            <a href="{{ route('admin.students.index') }}" class="text-gray-500 hover:text-brand-500 dark:text-gray-400 transition-colors">Siswa</a>
            <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
            <span class="font-medium text-gray-800 dark:text-white/90">{{ $student->name }}</span>
        </nav>

        <!-- Profile Header Card -->
        <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="p-5 sm:p-6">
                <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex items-center gap-4">
                        <span class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-brand-400 to-brand-600 text-xl font-bold text-white shadow-lg">
                            {{ strtoupper(substr($student->name, 0, 1)) }}
                        </span>
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90">{{ $student->name }}</h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $student->email }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.students.learning-sessions.index', $student) }}"
                           class="inline-flex items-center gap-2 rounded-lg bg-green-50 px-4 py-2 text-sm font-medium text-green-600 transition hover:bg-green-100 dark:bg-green-500/10 dark:text-green-400 dark:hover:bg-green-500/20">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                            Sesi Belajar
                        </a>
                        <a href="{{ route('admin.students.edit', $student) }}"
                           class="inline-flex items-center gap-2 rounded-lg bg-brand-50 px-4 py-2 text-sm font-medium text-brand-600 transition hover:bg-brand-100 dark:bg-brand-500/10 dark:text-brand-400 dark:hover:bg-brand-500/20">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                            Edit
                        </a>
                        <div x-data="{ showDeleteModal: false }">
                            <button @click="showDeleteModal = true"
                                    class="inline-flex items-center gap-2 rounded-lg bg-red-50 px-4 py-2 text-sm font-medium text-red-600 transition hover:bg-red-100 dark:bg-red-500/10 dark:text-red-400 dark:hover:bg-red-500/20">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                Hapus
                            </button>
                            <!-- Delete Modal -->
                            <div x-show="showDeleteModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-[99999] flex items-center justify-center p-4" x-cloak>
                                <div class="fixed inset-0 bg-gray-900/50 dark:bg-gray-900/70" @click="showDeleteModal = false"></div>
                                <div class="relative w-full max-w-md rounded-2xl bg-white p-6 shadow-xl dark:bg-gray-900" @click.outside="showDeleteModal = false">
                                    <div class="flex flex-col items-center text-center">
                                        <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-error-50 dark:bg-error-500/15">
                                            <svg class="h-7 w-7 text-error-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z" /></svg>
                                        </div>
                                        <h3 class="mb-2 text-lg font-semibold text-gray-800 dark:text-white/90">Hapus Siswa?</h3>
                                        <p class="mb-6 text-sm text-gray-500 dark:text-gray-400">Apakah kamu yakin ingin menghapus <strong>{{ $student->name }}</strong>? Semua data sesi belajar juga akan ikut terhapus. Tindakan ini tidak bisa dibatalkan.</p>
                                        <div class="flex items-center gap-3">
                                            <button @click="showDeleteModal = false" class="rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">Batal</button>
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
                </div>
            </div>
        </div>

        <!-- Info Grid -->
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            <!-- Left Column: Detail Info -->
            <div class="lg:col-span-2 space-y-6">
                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-800 sm:px-6">
                        <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Informasi Siswa</h3>
                    </div>
                    <div class="p-5 sm:p-6">
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                            <!-- Name -->
                            <div>
                                <p class="mb-1 text-xs font-medium uppercase tracking-wider text-gray-400 dark:text-gray-500">Nama Lengkap</p>
                                <p class="text-sm font-medium text-gray-800 dark:text-white/90">{{ $student->name }}</p>
                            </div>
                            <!-- Email -->
                            <div>
                                <p class="mb-1 text-xs font-medium uppercase tracking-wider text-gray-400 dark:text-gray-500">Email</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $student->email }}</p>
                            </div>
                            <!-- WhatsApp -->
                            <div>
                                <p class="mb-1 text-xs font-medium uppercase tracking-wider text-gray-400 dark:text-gray-500">WhatsApp</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $student->whatsapp_number ?? '-' }}</p>
                            </div>
                            <!-- Package -->
                            <div>
                                <p class="mb-1 text-xs font-medium uppercase tracking-wider text-gray-400 dark:text-gray-500">Paket</p>
                                @if($student->package_name)
                                    <span class="inline-flex rounded-full bg-brand-50 px-2.5 py-1 text-xs font-medium text-brand-600 dark:bg-brand-500/10 dark:text-brand-400">{{ $student->package_name }}</span>
                                @else
                                    <p class="text-sm text-gray-400">-</p>
                                @endif
                            </div>
                            <!-- Registered -->
                            <div>
                                <p class="mb-1 text-xs font-medium uppercase tracking-wider text-gray-400 dark:text-gray-500">Terdaftar Sejak</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $student->created_at->format('d M Y') }}</p>
                            </div>
                            <!-- Total Sessions -->
                            <div>
                                <p class="mb-1 text-xs font-medium uppercase tracking-wider text-gray-400 dark:text-gray-500">Total Sesi</p>
                                <p class="text-sm font-medium text-gray-800 dark:text-white/90">{{ $student->total_sessions ?? 0 }} sesi</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Learning Goal -->
                @if($student->learning_goal)
                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-800 sm:px-6">
                        <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Tujuan Belajar</h3>
                    </div>
                    <div class="p-5 sm:p-6">
                        <div class="prose max-w-none text-sm text-gray-600 dark:text-gray-400">
                            {{ $student->learning_goal }}
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <!-- Right Column: Progress -->
            <div class="space-y-6">
                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-800 sm:px-6">
                        <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Progress Belajar</h3>
                    </div>
                    <div class="p-5 sm:p-6">
                        <!-- Progress Circle Visual -->
                        <div class="flex flex-col items-center gap-4">
                            <div class="relative flex h-28 w-28 items-center justify-center">
                                <svg class="h-28 w-28 -rotate-90" viewBox="0 0 120 120">
                                    <circle cx="60" cy="60" r="52" fill="none" stroke-width="10" class="stroke-gray-100 dark:stroke-gray-800" />
                                    <circle cx="60" cy="60" r="52" fill="none" stroke-width="10" stroke-linecap="round"
                                            class="stroke-brand-500 transition-all duration-700"
                                            stroke-dasharray="{{ 2 * 3.14159 * 52 }}"
                                            stroke-dashoffset="{{ 2 * 3.14159 * 52 * (1 - ($progressPercentage / 100)) }}" />
                                </svg>
                                <span class="absolute text-xl font-bold text-gray-800 dark:text-white/90">{{ number_format($progressPercentage, 0) }}%</span>
                            </div>
                            <div class="text-center">
                                <p class="text-sm font-medium text-gray-800 dark:text-white/90">{{ $completedSessions }} / {{ $totalSessions }} Sesi</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">telah diselesaikan</p>
                            </div>
                        </div>

                        <!-- Stats -->
                        <div class="mt-5 space-y-3 border-t border-gray-100 pt-5 dark:border-gray-800">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Total Sesi</span>
                                <span class="text-sm font-medium text-gray-800 dark:text-white/90">{{ $totalSessions }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Selesai</span>
                                <span class="inline-flex items-center gap-1 text-sm font-medium text-green-600 dark:text-green-400">
                                    <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                    {{ $completedSessions }}
                                </span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Belum Selesai</span>
                                <span class="text-sm font-medium text-orange-500">{{ $totalSessions - $completedSessions }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back Button -->
        <div class="mt-6">
            <a href="{{ route('admin.students.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5M12 19L5 12l7-7" /></svg>
                Kembali ke Daftar Siswa
            </a>
        </div>

    </div>
</x-admin-layout>

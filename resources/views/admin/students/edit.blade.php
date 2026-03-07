<x-admin-layout>
    <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
        <!-- Breadcrumb -->
        <nav class="mb-5 flex items-center gap-1.5 text-sm">
            <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-brand-500 dark:text-gray-400 transition-colors">Dashboard</a>
            <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
            <a href="{{ route('admin.students.index') }}" class="text-gray-500 hover:text-brand-500 dark:text-gray-400 transition-colors">Siswa</a>
            <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
            <span class="font-medium text-gray-800 dark:text-white/90">Edit Siswa</span>
        </nav>

        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="flex items-center gap-3 px-5 py-4 sm:px-6 sm:py-5">
                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-500 text-sm font-bold text-white">
                    {{ strtoupper(substr($student->name, 0, 1)) }}
                </span>
                <div>
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Edit Siswa</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $student->email }}</p>
                </div>
            </div>

            <form action="{{ route('admin.students.update', $student) }}" method="POST"
                  class="border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">

                @method('PUT')
                @include('admin.students._form')

                <div class="mt-7 flex items-center gap-3">
                    <button type="submit"
                            class="inline-flex items-center gap-2 rounded-lg bg-brand-500 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-brand-600">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                        Perbarui
                    </button>
                    <a href="{{ route('admin.students.index') }}"
                       class="inline-flex items-center rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Students
        </h2>
    </x-slot>

    <div class="py-6 px-6">

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4 flex justify-between items-center">
            <form method="GET">
                <input type="text" name="search" placeholder="Search..."
                       value="{{ request('search') }}"
                       class="border rounded px-3 py-2 text-sm">
                <button class="bg-gray-800 text-white px-3 py-2 rounded text-sm">
                    Search
                </button>
            </form>

            <a href="{{ route('admin.students.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded text-sm">
                + Add Student
            </a>
        </div>

        <div class="bg-white shadow rounded overflow-hidden">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">Name</th>
                        <th class="p-3 text-left">Email</th>
                        <th class="p-3 text-left">Package</th>
                        <th class="p-3 text-left">Total Sessions</th>
                        <th class="p-3 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                        <tr class="border-t">
                            <td class="p-3">{{ $student->name }}</td>
                            <td class="p-3">{{ $student->email }}</td>
                            <td class="p-3">{{ $student->package_name }}</td>
                            <td class="p-3">{{ $student->total_sessions }}</td>
                            <td class="p-3 space-x-2">
                                <a href="{{ route('admin.students.show', $student) }}"
                                   class="text-blue-600">View</a>
                                <a href="{{ route('admin.students.edit', $student) }}"
                                   class="text-yellow-600">Edit</a>
                                <form action="{{ route('admin.students.destroy', $student) }}"
                                      method="POST"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Delete?')"
                                            class="text-red-600">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-4 text-center text-gray-500">
                                No students found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $students->links() }}
        </div>

    </div>
</x-app-layout>

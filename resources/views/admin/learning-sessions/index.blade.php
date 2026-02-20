<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Learning Sessions
        </h2>
    </x-slot>

    <div class="py-6 px-6">

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('admin.learning-sessions.create') }}" class="bg-blue-600 text-dark px-4 py-2 rounded text-sm">
            + Add Session
        </a>

        <div class="mt-4 bg-white shadow rounded overflow-hidden">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">Session</th>
                        <th class="p-3 text-left">Student</th>
                        <th class="p-3 text-left">Title</th>
                        <th class="p-3 text-left">Meeting Date</th>
                        <th class="p-3 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sessions as $session)
                        <tr class="border-t">
                            <td class="p-3">{{ $session->session_number }}</td>
                            <td class="p-3">{{ $session->user->name }}</td>
                            <td class="p-3">{{ $session->title }}</td>
                            <td class="p-3">{{ $session->meeting_date }}</td>
                            <td class="p-3 space-x-2">
                                <a href="{{ route('admin.learning-sessions.show', $session) }}"
                                    class="text-blue-600">View</a>
                                <a href="{{ route('admin.learning-sessions.edit', $session) }}"
                                    class="text-yellow-600">Edit</a>
                                <form action="{{ route('admin.learning-sessions.destroy', $session) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Delete?')" class="text-red-600">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-4 text-center text-gray-500">
                                No sessions found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $sessions->links() }}
        </div>

    </div>
</x-app-layout>

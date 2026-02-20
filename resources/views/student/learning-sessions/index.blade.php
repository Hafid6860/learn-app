<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            My Learning Sessions
        </h2>
    </x-slot>

    <div class="py-6 px-6">

        <div class="bg-white shadow rounded overflow-hidden">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">Title</th>
                        <th class="p-3 text-left">Meeting Date</th>
                        <th class="p-3 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sessions as $session)
                        <tr class="border-t">
                            <td class="p-3">{{ $session->title }}</td>
                            <td class="p-3">{{ $session->meeting_date }}</td>
                            <td class="p-3">
                                <a href="{{ route('learning-sessions.show', $session) }}"
                                    class="text-blue-600 underline">
                                    View
                                </a>
                            </td>
                        </tr>
                        @if ($session->pivot?->is_completed)
                            <span class="text-dark-600 text-xs">Completed</span>
                        @endif
                    @empty
                        <tr>
                            <td colspan="3" class="p-4 text-center text-gray-500">
                                No learning sessions yet.
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

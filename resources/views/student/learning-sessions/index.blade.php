<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Learning Sessions
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            {{-- Success Message --}}
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Information Message --}}
            @if(session('info'))
                <div class="mb-4 p-4 bg-blue-100 text-blue-700 rounded">
                    {{ session('info') }}
                </div>
            @endif

            {{-- Error Message --}}
            @if(session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            @endif


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    @if($sessions->isEmpty())
                        <p class="text-gray-500">
                            No learning sessions available yet.
                        </p>
                    @else

                        <table class="min-w-full border">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-3 text-left">Session</th>
                                    <th class="p-3 text-left">Date</th>
                                    <th class="p-3 text-left">Status</th>
                                    <th class="p-3 text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sessions as $learningSession)

                                    @php
                                        $isUnlocked = $learningSession->isUnlockedFor(auth()->user());
                                        $isCompleted = auth()->user()
                                            ->completedSessions
                                            ->contains($learningSession->id);
                                    @endphp


                                    <tr class="border-t">
                                        <td class="p-3">
                                            @if($isUnlocked)
                                                <span class="text-gray-800 font-medium">
                                                    Pertemuan {{ $learningSession->session_number }} -
                                                    {{ $learningSession->title }}
                                                </span>
                                            @else
                                                <span class="text-gray-400">
                                                    🔒 Pertemuan {{ $learningSession->session_number }} -
                                                    {{ $learningSession->title }}
                                                </span>
                                            @endif
                                        </td>

                                        {{-- DATE --}}
                                        <td class="p-3">
                                            {{ \Carbon\Carbon::parse($learningSession->meeting_date)->format('d M Y') }}
                                        </td>

                                        {{-- STATUS --}}
                                        <td class="p-3">
                                            @if($isCompleted)
                                                <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">
                                                    Completed
                                                </span>
                                            @elseif(!$isUnlocked)
                                                <span class="px-2 py-1 text-xs bg-gray-200 text-gray-600 rounded">
                                                    Locked
                                                </span>
                                            @else
                                                <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded">
                                                    In Progress
                                                </span>
                                            @endif
                                        </td>

                                        {{-- ACTION --}}
                                        <td class="p-3">

                                            @if(!$isUnlocked)
                                                <button disabled
                                                    class="px-4 py-2 bg-gray-300 text-gray-600 rounded cursor-not-allowed">
                                                    Locked
                                                </button>

                                            @else
                                                <a href="{{ route('learning-sessions.show', $learningSession) }}"
                                                   class="px-4 py-2 bg-blue-600 text-dark rounded hover:bg-blue-700">
                                                    View
                                                </a>
                                            @endif

                                        </td>

                                    </tr>

                                @endforeach
                            </tbody>
                        </table>

                    @endif

                </div>
            </div>

        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ $learningSession->title }}
        </h2>
    </x-slot>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if (session('info'))
        <div class="mb-4 p-4 bg-blue-100 text-blue-700 rounded">
            {{ session('info') }}
        </div>
    @endif



    <div class="py-6 px-6 space-y-6">

        <div class="bg-white p-6 rounded shadow">
            <p><strong>Meeting Date:</strong> {{ $learningSession->meeting_date }}</p>
        </div>

        <div class="bg-white p-6 rounded shadow">
            <h3 class="font-semibold mb-2">Summary</h3>
            <p class="whitespace-pre-line">
                {{ $learningSession->summary }}
            </p>
        </div>

        @if ($learningSession->youtube_embed_url)
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-semibold mb-4">Video</h3>

                <iframe src="{{ $learningSession->youtube_embed_url }}" class="w-full h-96 rounded" frameborder="0"
                    allowfullscreen>
                </iframe>
            </div>
        @endif



        @if ($learningSession->source_code_url)
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-semibold mb-2">Source Code</h3>
                <a href="{{ $learningSession->source_code_url }}" target="_blank" class="text-blue-600 underline">
                    Download Source Code
                </a>
            </div>
        @endif

        @can('complete', $learningSession)

            @if (!$learningSession->isCompletedBy(auth()->user()))
                <form action="{{ route('learning-sessions.complete', $learningSession) }}" method="POST" class="mt-4">
                    @csrf
                    <button class="bg-green-600 text-dark px-4 py-2 rounded">
                        Mark as Completed
                    </button>
                </form>

            @else
                <div class="mt-4">
                    <span class="bg-green-100 text-dark-700 px-4 py-2 rounded">
                        ✔ Completed
                    </span>
                </div>
            @endif

        @endcan


        <div>
            <a href="{{ route('learning-sessions.index') }}" class="text-dark-600 underline">
                ← Back
            </a>
        </div>


    </div>
</x-app-layout>

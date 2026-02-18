<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Learning Session Detail
        </h2>
    </x-slot>

    <div class="py-6 px-6 space-y-6">

        <div class="bg-white p-6 rounded shadow space-y-3">
            <p><strong>Student:</strong> {{ $learningSession->user->name }}</p>
            <p><strong>Title:</strong> {{ $learningSession->title }}</p>
            <p><strong>Meeting Date:</strong> {{ $learningSession->meeting_date }}</p>
        </div>

        <div class="bg-white p-6 rounded shadow">
            <h3 class="font-semibold mb-2">Summary</h3>
            <p class="whitespace-pre-line">
                {{ $learningSession->summary }}
            </p>
        </div>

        @if($learningSession->video_url)
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-semibold mb-2">Video</h3>
                <a href="{{ $learningSession->video_url }}"
                   target="_blank"
                   class="text-blue-600 underline">
                    Open Video
                </a>
            </div>
        @endif

        @if($learningSession->source_code_url)
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-semibold mb-2">Source Code</h3>
                <a href="{{ $learningSession->source_code_url }}"
                   target="_blank"
                   class="text-blue-600 underline">
                    Download / View Source Code
                </a>
            </div>
        @endif

        <div>
            <a href="{{ route('admin.learning-sessions.index') }}"
               class="text-dark-600 underline">
                ← Back to list
            </a>
        </div>

    </div>
</x-app-layout>

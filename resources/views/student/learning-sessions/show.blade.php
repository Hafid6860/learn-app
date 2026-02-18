<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ $learningSession->title }}
        </h2>
    </x-slot>

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

        @if($learningSession->video_url)
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-semibold mb-2">Video</h3>
                <a href="{{ $learningSession->video_url }}"
                   target="_blank"
                   class="text-blue-600 underline">
                    Watch Video
                </a>
            </div>
        @endif

        @if($learningSession->source_code_url)
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-semibold mb-2">Source Code</h3>
                <a href="{{ $learningSession->source_code_url }}"
                   target="_blank"
                   class="text-blue-600 underline">
                    Download Source Code
                </a>
            </div>
        @endif

        <div>
            <a href="{{ route('learning-sessions.index') }}"
               class="text-dark-600 underline">
                ← Back
            </a>
        </div>

    </div>
</x-app-layout>

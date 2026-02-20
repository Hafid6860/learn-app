@csrf

<div class="space-y-4">

    <div>
        <label class="block text-sm">Student</label>
        <select name="user_id" class="w-full border rounded px-3 py-2">
            @foreach ($students as $student)
                <option value="{{ $student->id }}" @selected(old('user_id', $learningSession->user_id ?? '') == $student->id)>
                    {{ $student->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block text-sm">Title</label>
        <input type="text" name="title" value="{{ old('title', $learningSession->title ?? '') }}"
            class="w-full border rounded px-3 py-2">
    </div>

        <div class="mb-4">
            <label class="block font-medium text-sm text-gray-700">
                Summary (Markdown Supported)
            </label>

            <textarea name="summary" rows="8" class="w-full border-gray-300 rounded-md shadow-sm" required>{{ old('summary') }}</textarea>

            <p class="text-sm text-gray-500 mt-1">
                You can use Markdown syntax.
            </p>
        </div>

    <div>
        <label class="block text-sm">Video URL</label>
        <input type="url" name="video_url" value="{{ old('video_url', $learningSession->video_url ?? '') }}"
            class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="block text-sm">Source Code URL</label>
        <input type="url" name="source_code_url"
            value="{{ old('source_code_url', $learningSession->source_code_url ?? '') }}"
            class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="block text-sm">Meeting Date</label>
        <input type="date" name="meeting_date"
            value="{{ old('meeting_date', $learningSession->meeting_date ?? '') }}"
            class="w-full border rounded px-3 py-2">
    </div>

</div>

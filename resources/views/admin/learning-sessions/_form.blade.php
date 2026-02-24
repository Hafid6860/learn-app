@csrf

<div class="space-y-4">

    <div>
        <label class="block text-sm mb-1">Student</label>
        <select name="user_id" class="w-full border @error('user_id') border-red-500 @enderror rounded px-3 py-2">
            @foreach($students as $student)
                <option value="{{ $student->id }}"
                    @selected(old('user_id', $learningSession->user_id ?? '') == $student->id)>
                    {{ $student->name }}
                </option>
            @endforeach
        </select>
        @error('user_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm mb-1">Title</label>
        <input type="text" name="title"
               value="{{ old('title', $learningSession->title ?? '') }}"
               class="w-full border @error('title') border-red-500 @enderror rounded px-3 py-2">
        @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm mb-1">Summary</label>
        <textarea id="summary" name="summary"
                  class="w-full border @error('summary') border-red-500 @enderror rounded px-3 py-2">{{ old('summary', $learningSession->summary ?? '') }}</textarea>
        @error('summary')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm mb-1">Video URL</label>
        <input type="url" name="video_url"
               value="{{ old('video_url', $learningSession->video_url ?? '') }}"
               class="w-full border @error('video_url') border-red-500 @enderror rounded px-3 py-2">
        @error('video_url')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm mb-1">Source Code URL</label>
        <input type="url" name="source_code_url"
               value="{{ old('source_code_url', $learningSession->source_code_url ?? '') }}"
               class="w-full border @error('source_code_url') border-red-500 @enderror rounded px-3 py-2">
        @error('source_code_url')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm mb-1">Meeting Date</label>
        <input type="date" name="meeting_date"
               value="{{ old('meeting_date', $learningSession->meeting_date ?? '') }}"
               class="w-full border @error('meeting_date') border-red-500 @enderror rounded px-3 py-2">
        @error('meeting_date')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        ClassicEditor
            .create(document.querySelector('#summary'))
            .catch(error => {
                console.error(error);
            });
    });
</script>
<style>
    /* Mengatur style default CKEditor agar tidak terlalu pendek ujungnya */
    .ck-editor__editable[role="textbox"] {
        min-height: 200px;
    }
</style>


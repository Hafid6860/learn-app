@csrf

<div class="-mx-2.5 flex flex-wrap gap-y-5">

    <!-- Section: Detail Sesi -->
    <div class="w-full px-2.5">
        <h4 class="pb-4 text-base font-medium text-gray-800 border-b border-gray-200 dark:border-gray-800 dark:text-white/90">
            Detail Sesi Belajar
        </h4>
    </div>

    <!-- Title -->
    <div class="w-full px-2.5 xl:w-1/2">
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Judul Sesi</label>
        <input type="text" name="title" placeholder="Contoh: Pengenalan HTML & CSS"
               value="{{ old('title', $learningSession->title ?? '') }}"
               class="dark:bg-gray-900 h-11 w-full rounded-lg border @error('title') border-error-300 @else border-gray-300 @enderror bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
        @error('title')
            <p class="text-error-500 text-theme-xs mt-1.5">{{ $message }}</p>
        @enderror
    </div>

    <!-- Meeting Date -->
    <div class="w-full px-2.5 xl:w-1/2">
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Tanggal Pertemuan</label>
        <div class="relative">
            <input type="text" name="meeting_date" placeholder="Pilih tanggal"
                   value="{{ old('meeting_date', $learningSession->meeting_date ?? '') }}"
                   class="cursor-pointer datepickerTwo dark:bg-gray-900 h-11 w-full appearance-none rounded-lg border @error('meeting_date') border-error-300 @else border-gray-300 @enderror bg-transparent bg-none px-4 py-2.5 pr-11 pl-4 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
            <span class="pointer-events-none absolute top-1/2 right-3 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M6.66659 1.5415C7.0808 1.5415 7.41658 1.87729 7.41658 2.2915V2.99984H12.5833V2.2915C12.5833 1.87729 12.919 1.5415 13.3333 1.5415C13.7475 1.5415 14.0833 1.87729 14.0833 2.2915V2.99984L15.4166 2.99984C16.5212 2.99984 17.4166 3.89527 17.4166 4.99984V7.49984V15.8332C17.4166 16.9377 16.5212 17.8332 15.4166 17.8332H4.58325C3.47868 17.8332 2.58325 16.9377 2.58325 15.8332V7.49984V4.99984C2.58325 3.89527 3.47868 2.99984 4.58325 2.99984L5.91659 2.99984V2.2915C5.91659 1.87729 6.25237 1.5415 6.66659 1.5415ZM6.66659 4.49984H4.58325C4.30711 4.49984 4.08325 4.7237 4.08325 4.99984V6.74984H15.9166V4.99984C15.9166 4.7237 15.6927 4.49984 15.4166 4.49984H13.3333H6.66659ZM15.9166 8.24984H4.08325V15.8332C4.08325 16.1093 4.30711 16.3332 4.58325 16.3332H15.4166C15.6927 16.3332 15.9166 16.1093 15.9166 15.8332V8.24984Z" fill="" /></svg>
            </span>
        </div>
        @error('meeting_date')
            <p class="text-error-500 text-theme-xs mt-1.5">{{ $message }}</p>
        @enderror
    </div>

    <!-- Section: Konten -->
    <div class="w-full px-2.5 mt-2">
        <h4 class="pb-4 text-base font-medium text-gray-800 border-b border-gray-200 dark:border-gray-800 dark:text-white/90">
            Konten Sesi
        </h4>
    </div>

    <!-- Summary -->
    <div class="w-full px-2.5">
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Ringkasan</label>
        <textarea id="summary" name="summary" rows="6" placeholder="Tuliskan ringkasan materi..."
                  class="dark:bg-gray-900 w-full rounded-lg border @error('summary') border-error-300 @else border-gray-300 @enderror bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">{{ old('summary', $learningSession->summary ?? '') }}</textarea>
        @error('summary')
            <p class="text-error-500 text-theme-xs mt-1.5">{{ $message }}</p>
        @enderror
    </div>

    <!-- Section: Sumber Belajar -->
    <div class="w-full px-2.5 mt-2">
        <h4 class="pb-4 text-base font-medium text-gray-800 border-b border-gray-200 dark:border-gray-800 dark:text-white/90">
            Sumber Belajar
        </h4>
    </div>

    <!-- Video URL -->
    <div class="w-full px-2.5 xl:w-1/2">
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Video URL</label>
        <div class="relative">
            <span class="absolute text-gray-500 -translate-y-1/2 left-4 top-1/2 dark:text-gray-400">
                <svg class="fill-current" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" /></svg>
            </span>
            <input type="url" name="video_url" placeholder="https://youtube.com/watch?v=..."
                   value="{{ old('video_url', $learningSession->video_url ?? '') }}"
                   class="dark:bg-gray-900 h-11 w-full rounded-lg border @error('video_url') border-error-300 @else border-gray-300 @enderror bg-transparent px-4 py-2.5 pl-11 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
        </div>
        @error('video_url')
            <p class="text-error-500 text-theme-xs mt-1.5">{{ $message }}</p>
        @enderror
    </div>

    <!-- Source Code URL -->
    <div class="w-full px-2.5 xl:w-1/2">
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Source Code URL</label>
        <div class="relative">
            <span class="absolute text-gray-500 -translate-y-1/2 left-4 top-1/2 dark:text-gray-400">
                <svg class="fill-current" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.4 16.6L4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4zm5.2 0l4.6-4.6-4.6-4.6L16 6l6 6-6 6-1.4-1.4z" /></svg>
            </span>
            <input type="url" name="source_code_url" placeholder="https://github.com/..."
                   value="{{ old('source_code_url', $learningSession->source_code_url ?? '') }}"
                   class="dark:bg-gray-900 h-11 w-full rounded-lg border @error('source_code_url') border-error-300 @else border-gray-300 @enderror bg-transparent px-4 py-2.5 pl-11 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
        </div>
        @error('source_code_url')
            <p class="text-error-500 text-theme-xs mt-1.5">{{ $message }}</p>
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
    .ck-editor__editable[role="textbox"] {
        min-height: 200px;
    }
</style>

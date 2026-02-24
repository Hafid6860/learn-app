@csrf

<div class="space-y-4">

    <div>
        <label class="block text-sm mb-1">Name</label>
        <input type="text" name="name"
               value="{{ old('name', $student->name ?? '') }}"
               class="w-full border @error('name') border-red-500 @enderror rounded px-3 py-2">
        @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm mb-1">Email</label>
        <input type="email" name="email"
               value="{{ old('email', $student->email ?? '') }}"
               class="w-full border @error('email') border-red-500 @enderror rounded px-3 py-2">
        @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm mb-1">Password</label>
        <input type="password" name="password"
               class="w-full border @error('password') border-red-500 @enderror rounded px-3 py-2">
        @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm mb-1">Whatsapp Number</label>
        <input type="text" name="whatsapp_number"
               value="{{ old('whatsapp_number', $student->whatsapp_number ?? '') }}"
               class="w-full border @error('whatsapp_number') border-red-500 @enderror rounded px-3 py-2">
        @error('whatsapp_number')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm mb-1">Learning Goal</label>
        <textarea name="learning_goal"
                  class="w-full border @error('learning_goal') border-red-500 @enderror rounded px-3 py-2">{{ old('learning_goal', $student->learning_goal ?? '') }}</textarea>
        @error('learning_goal')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm mb-1">Package Name</label>
        <input type="text" name="package_name"
               value="{{ old('package_name', $student->package_name ?? '') }}"
               class="w-full border @error('package_name') border-red-500 @enderror rounded px-3 py-2">
        @error('package_name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm mb-1">Total Sessions</label>
        <input type="number" name="total_sessions"
               value="{{ old('total_sessions', $student->total_sessions ?? 0) }}"
               class="w-full border @error('total_sessions') border-red-500 @enderror rounded px-3 py-2">
        @error('total_sessions')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

</div>

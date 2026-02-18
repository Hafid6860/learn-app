@csrf

<div class="space-y-4">

    <div>
        <label class="block text-sm">Name</label>
        <input type="text" name="name"
               value="{{ old('name', $student->name ?? '') }}"
               class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="block text-sm">Email</label>
        <input type="email" name="email"
               value="{{ old('email', $student->email ?? '') }}"
               class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="block text-sm">Password (optional for edit)</label>
        <input type="password" name="password"
               class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="block text-sm">Whatsapp Number</label>
        <input type="text" name="whatsapp_number"
               value="{{ old('whatsapp_number', $student->whatsapp_number ?? '') }}"
               class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="block text-sm">Learning Goal</label>
        <textarea name="learning_goal"
                  class="w-full border rounded px-3 py-2">{{ old('learning_goal', $student->learning_goal ?? '') }}</textarea>
    </div>

    <div>
        <label class="block text-sm">Package Name</label>
        <input type="text" name="package_name"
               value="{{ old('package_name', $student->package_name ?? '') }}"
               class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="block text-sm">Total Sessions</label>
        <input type="number" name="total_sessions"
               value="{{ old('total_sessions', $student->total_sessions ?? 0) }}"
               class="w-full border rounded px-3 py-2">
    </div>

</div>

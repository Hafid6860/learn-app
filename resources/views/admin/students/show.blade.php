<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Student Detail
        </h2>
    </x-slot>

    <div class="py-6 px-6 space-y-4">

        <div class="bg-white p-6 rounded shadow space-y-2">
            <p><strong>Name:</strong> {{ $student->name }}</p>
            <p><strong>Email:</strong> {{ $student->email }}</p>
            <p><strong>Whatsapp:</strong> {{ $student->whatsapp_number }}</p>
            <p><strong>Package:</strong> {{ $student->package_name }}</p>
            <p><strong>Learning Goal:</strong> {{ $student->learning_goal }}</p>
        </div>

        <div class="bg-white p-6 rounded shadow">
            <p><strong>Progress:</strong></p>
            <p>{{ $completedSessions }} / {{ $totalSessions }} Sessions</p>
            <p>{{ number_format($progressPercentage, 2) }}%</p>
        </div>

    </div>
</x-app-layout>

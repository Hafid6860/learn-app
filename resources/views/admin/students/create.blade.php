<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Create Student
        </h2>
    </x-slot>

    <div class="py-6 px-6">
        <form action="{{ route('admin.students.store') }}" method="POST"
              class="bg-white p-6 rounded shadow space-y-4">

            @include('admin.students._form')

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Save
            </button>
        </form>
    </div>
</x-app-layout>

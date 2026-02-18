<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Edit Student
        </h2>
    </x-slot>

    <div class="py-6 px-6">
        <form action="{{ route('admin.students.update', $student) }}"
              method="POST"
              class="bg-white p-6 rounded shadow space-y-4">

            @method('PUT')

            @include('admin.students._form')

            <button class="bg-yellow-600 text-dark px-4 py-2 rounded">
                Update
            </button>
        </form>
    </div>
</x-app-layout>

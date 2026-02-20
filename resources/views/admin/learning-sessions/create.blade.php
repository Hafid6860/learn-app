<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Create Learning Session
        </h2>
    </x-slot>

    <div class="py-6 px-6">
        <form action="{{ route('admin.learning-sessions.store') }}" method="POST"
            class="bg-white p-6 rounded shadow space-y-4">

            @if ($errors->has('user_id'))
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    {{ $errors->first('user_id') }}
                </div>
            @endif

            @include('admin.learning-sessions._form')

            <div class="flex justify-end">
                <button class="bg-blue-600 text-dark px-4 py-2 rounded">
                    Save
                </button>
            </div>

        </form>
    </div>
</x-app-layout>

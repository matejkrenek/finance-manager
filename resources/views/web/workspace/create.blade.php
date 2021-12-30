<x-layout>
    <h1>Vytvořit workspace</h1>
    <div style="width: 48rem; margin: 8rem auto">
        <x-messages />
        <form method="POST" action="{{ route('workspace.create') }}" enctype="multipart/form-data">
            @csrf

            <div class="mt-4">
                <label for="name" class="block font-medium text-sm text-gray-700">Název</label>
                <input type="text" name="name" id="name" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" value="{{ old('name') }}">
            </div>

            <div class="mt-4">
                <label for="description" class="block font-medium text-sm text-gray-700">Popis</label>
                <textarea name="description" id="description" cols="30" rows="10" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">{{ old('description') }}</textarea>
            </div>
            <div class="mt-4">
                <label for="image" class="block font-medium text-sm text-gray-700">Image</label>
                <input type="file" name="image" id="image" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">
            </div>

            <div class="flex items-center justify-end mt-6">

                <button type="submit" class="ml-3">
                    {{ __('Save') }}
                </button>
            </div>
        </form>
    </div>
</x-layout>
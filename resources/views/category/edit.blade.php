<x-app-layout>
    <form action="{{ route('category.update', $category->id) }}" method="post" class="max-w-lg mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        @csrf
        @method('PATCH')

        {{-- Write title --}}
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Categorie naam</label>
            <input required type="text" value="{{ $category->title }}" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        {{-- Write description / content --}}
        <div class="mb-6">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Beschrijving</label>
            <textarea required name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-24">{{ $category->description }}</textarea>
        </div>

        {{-- Submit btn --}}
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Verander categorie</button>
        </div>
    </form>
</x-app-layout>

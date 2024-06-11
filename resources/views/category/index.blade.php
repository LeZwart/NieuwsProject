<x-app-layout>
    <div class="flex row">
        <a href="{{ route('category.create') }}" class="px-4 py-2 m-2 bg-blue-500 text-white rounded hover:bg-blue-600">Maak Categorie</a>
    </div>
    @foreach ($categories as $category)
        <a href="{{ route('category.show', $category->id) }}" class="block p-4 sm:p-8 bg-white shadow sm:rounded-lg hover:bg-gray-100">
            <div class="max-w-xl">
                <h1 class="text-2xl font-semibold text-gray-900">{{ $category->title }}</h1>
                <div>
                    <span class="text-gray-600">{{ $category->created_at }}</span>
                </div>
                <p class="text-gray-800">{{ $category->description }}</p>
            </div>
        </a>
    @endforeach
</x-app-layout>

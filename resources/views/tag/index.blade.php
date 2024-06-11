<x-app-layout>
    <div class="flex row">
        <a href="{{ route('tag.create') }}" class="px-4 py-2 m-2 bg-blue-500 text-white rounded hover:bg-blue-600">Maak Tag</a>
    </div>
    @foreach ($tags as $tag)
        <a href="{{ route('tag.show', $tag->id) }}" class="block p-4 sm:p-8 bg-white shadow sm:rounded-lg hover:bg-gray-100">
            <div class="max-w-xl">
                <h1 class="text-2xl font-semibold text-gray-900">{{ $tag->title }}</h1>
                <div>
                    <span class="text-gray-600">{{ $tag->created_at }}</span>
                </div>
                <p class="text-gray-800">{{ $tag->description }}</p>
            </div>
        </a>
    @endforeach
</x-app-layout>

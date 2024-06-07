<x-app-layout>

    @foreach ($newsposts as $news)
        <a href="{{ route('news.show', $news->id) }}" class="block p-4 sm:p-8 bg-white shadow sm:rounded-lg hover:bg-gray-100">
            <div class="max-w-xl">
                <h1 class="text-2xl font-semibold text-gray-900">{{ $news->title }}</h1>
                <div>
                    <span class="text-gray-600">{{ $news->created_at }}</span>
                    <span>//</span>
                    <span class="text-gray-600">{{ $news->author->name }}</span>
                </div>
                <div>
                    <span class="inline-block bg-blue-200 rounded-full px-3 py-1 text-sm font-semibold text-cyan-700 mr-2">{{ $news->category->title }}</span>
                    @foreach ($news->tags as $tag)
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $tag->title }}</span>
                    @endforeach
                </div>
                <p class="text-gray-800">{{ $news->description }}</p>
            </div>
        </a>
    @endforeach
</x-app-layout>

<x-app-layout>

    @foreach ($newsposts as $news)
        <a href="{{ route('news.show', $news->id) }}" class="block p-4 sm:p-8 bg-white shadow sm:rounded-lg hover:bg-gray-100">
            <div class="max-w-xl">
                <h1 class="text-2xl font-semibold text-gray-900">{{ $news->title }}</h1>
                <p class="text-gray-600">{{ $news->created_at }}</p>
                <p class="text-gray-800">{{ $news->content }}</p>
            </div>
        </a>
    @endforeach
</x-app-layout>

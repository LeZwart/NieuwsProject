<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h1 class="text-2xl font-semibold text-gray-900">{{ $newspost->title }}</h1>
                    <div>
                        <span class="text-gray-600">{{ $newspost->created_at }}</span>
                        <span>  \\  </span>
                        <span class="text-gray-600" > {{ $newspost->author->name }} </span>
                    </div>
                    @if ($newspost->author->id === Auth::id())
                        <div class="mt-4">
                            <a href="{{ route('news.edit', $newspost->id) }}" class="text-blue-500 hover:text-blue-700">Bewerk</a>
                            <form action="{{ route('news.delete', $newspost->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Verwijder</button>
                            </form>
                        </div>
                    @endif
                    <div>
                        <span class="inline-block bg-blue-200 rounded-full px-3 py-1 text-sm font-semibold text-cyan-700 mr-2">{{ $newspost->category->title }}</span>
                        @foreach ($newspost->tags as $tag)
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $tag->title }}</span>
                        @endforeach
                    </div>
                    <p class="text-gray-800">{{ $newspost->description }}</p>
                </div>

                {{-- Comment section --}}
                <div class="mt-8">
                    <h2 class="text-xl font-semibold text-gray-900">Reacties</h2>
                    <div class="mt-4">
                        @foreach ($newspost->comments as $comment)
                            <div class="bg-gray-100 p-4 rounded-lg mt-4">
                                <div class="flex justify-between">
                                    <span class="text-gray-800">{{ $comment->author->name }}</span>
                                    <span class="text-gray-600">{{ $comment->created_at }}</span>
                                </div>
                                <p class="mt-2 text-gray-800">{{ $comment->content }}</p>
                            </div>
                        @endforeach
                    </div>

            </div>
        </div>
    </div>
</x-app-layout>


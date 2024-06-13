<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h1 class="text-2xl font-semibold text-gray-900">{{ $newspost->title }}</h1>
                    <div>
                        <span class="text-gray-600">{{ $newspost->created_at->DiffForHumans() }}</span>
                        <?php
                        if ($newspost->created_at != $newspost->updated_at) {
                            echo '<span>  \\\  </span>';
                            echo "<span class='text-gray-600'>Gewijzigd: " . $newspost->updated_at->DiffForHumans() . '</span>';
                        }
                        ?>
                        <h2 class="text-gray-600"> {{ $newspost->author->name }} </h2>
                    </div>
                    @if ($newspost->author->id === Auth::id())
                        <div class="mt-4">
                            <a href="{{ route('news.edit', $newspost->id) }}"
                                class="text-blue-500 hover:text-blue-700">Bewerk</a>
                            <form action="{{ route('news.delete', $newspost->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Verwijder</button>
                            </form>
                        </div>
                    @endif
                    <div>
                        <span
                            class="inline-block bg-blue-200 rounded-full px-3 py-1 text-sm font-semibold text-cyan-700 mr-2">{{ $newspost->category->title }}</span>
                        @foreach ($newspost->tags as $tag)
                            <span
                                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $tag->title }}</span>
                        @endforeach
                    </div>
                    <p class="text-gray-800 whitespace-pre-wrap">{{ $newspost->description }}</p>
                </div>

                {{-- Comment section --}}
                <div class="mt-8">
                    <h2 class="text-xl font-semibold text-gray-900">Reacties</h2>
                    <div class="mt-4">
                        <form action="{{ route('comment.upload') }}" method="post">
                            <input type="hidden" name="news_id" value="{{ $newspost->id }}">
                            @csrf
                            <div class="mb-4">
                                <label for="comment" class="block text-gray-700 text-sm font-bold mb-2">Reactie</label>
                                <textarea required name="comment" id="comment"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-24"></textarea>
                                <button type="submit"
                                    class="bg-blue-500 mt-2 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Verzend</button>
                            </div>
                        </form>
                        <div>
                            @foreach ($newspost->comments as $comment)
                                <div class="bg-gray-100 p-4 rounded-lg mt-4">
                                    <div class="flex row justify-start">
                                        <h4 class="text-xl pr-4">{{ $comment->Reviewer->name }}</h4>
                                        @if ($comment->reviewer_id === Auth::id())
                                        <form action="{{ route('comment.delete', $comment->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-500 hover:text-red-700">Verwijder</button>
                                        </form>
                                        <a href="{{ route('comment.edit', $comment->id) }}" class="text-blue-500 hover:text-blue-700 pl-4">Bewerk</a>
                                        @endif
                                    </div>
                                    <div class="flex justify-end">
                                        <span class="text-gray-800">{{ $comment->comment }}</span>
                                    </div>
                                    <div class="mt-2">
                                        <span class="text-gray-600">{{ $comment->created_at->DiffForHumans() }}</span>
                                        <?php
                                        if ($comment->created_at != $comment->updated_at) {
                                            echo '<span>  \\\  </span>';
                                            echo "<span class='text-gray-600'>Gewijzigd: " . $comment->updated_at->DiffForHumans() . '</span>';
                                        }
                                        ?>
                                        <p class="whitespace-pre-wrap">{{ $comment->message }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>

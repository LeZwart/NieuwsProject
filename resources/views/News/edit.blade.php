<?php
use App\Models\Category;
use App\Models\Tag;

$categories = Category::all();
$tags = Tag::all();
?>

<x-app-layout>
    <form action="{{ route('news.update', $newspost->id) }}" method="post" class="max-w-lg mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        @csrf
        @method('PATCH')

        {{-- Write title --}}
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input required type="text" name="title" id="title" value="{{ $newspost->title }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        {{-- Select category --}}
        <div>
            <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category</label>

            {{-- TODO: Not good in the long run, will fill up the screen when too many categories --}}
            {{-- Low Prio --}}
            <select required name="category" id="category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $newspost->category_id == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>

        {{-- Select tags (multiple) --}}
        <div class="mb-4">
            <label for="tags" class="block text-gray-700 text-sm font-bold mb-2">Tags</label>
            <input type="text" id="tag-input" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

            <div class="suggestion-list mt-2"></div>
            <div class="tag-list mt-2">
                @foreach ($newspost->tags as $tag)
                    <div class="tag inline-block bg-blue-100 text-blue-700 rounded-full px-4 py-1 mr-2 mb-2 flex items-center">
                        <input type="hidden" name="tags[]" value="{{ $tag->id }}">
                        <span class="mr-2">{{ $tag->title }}</span>
                        <button type="button" class="remove-tag text-red-500 hover:text-red-700 font-bold">X</button>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Write description / content --}}
        <div class="mb-6">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Beschrijving</label>
            <textarea required name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-24">{{ $newspost->description }}</textarea>
        </div>

        {{-- Submit btn --}}
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Nieuws</button>
        </div>
    </form>

    <script>
        const tags = @json($tags);
        const tagInput = document.getElementById('tag-input');

        tagInput.addEventListener('input', function() {
            const value = this.value.trim();
            const tag = tags.find(tag => tag.title.toLowerCase() === value.toLowerCase());

            if (tag) {
                highlightTag(tag);
            } else {
                displaySuggestions(value);
            }
        });

        function highlightTag(tag) {
            const suggestion = document.getElementById('suggestion-' + tag.id);

            if (suggestion) {
                suggestion.classList.add('bg-green-200', 'text-green-700');
            } else {
                addTag(tag);
            }
        }

        function addTag(tag) {
            const tagId = tag.id;
            const tagList = document.querySelector('.tag-list');
            const tagInputName = 'tags[]';

            // Check if the tag is already added
            if (!Array.from(tagList.querySelectorAll('input')).some(input => input.value == tagId)) {

                const tagElement = document.createElement('div');
                tagElement.classList.add('tag', 'inline-block', 'bg-blue-100', 'text-blue-700', 'rounded-full', 'px-4', 'py-1', 'mr-2', 'mb-2', 'flex', 'items-center');

                tagElement.innerHTML = `
                    <input type="hidden" name="${tagInputName}" value="${tagId}">
                    <span class="mr-2">${tag.title}</span>
                    <button type="button" class="remove-tag text-red-500 hover:text-red-700 font-bold">X</button>
                `;

                tagList.appendChild(tagElement);
                suggestionList = document.querySelector('.suggestion-list');
                suggestionList.innerHTML = '';
            }
        }

        function displaySuggestions(value) {
            const filteredTags = tags.filter(tag => tag.title.toLowerCase().includes(value.toLowerCase()));
            const suggestionList = document.querySelector('.suggestion-list');
            suggestionList.innerHTML = '';

            if (filteredTags.length && value.length > 0) {
                filteredTags.forEach(tag => {
                    const suggestion = document.createElement('p');
                    suggestion.id = 'suggestion-' + tag.id;
                    suggestion.classList.add('suggestion', 'bg-blue-100', 'text-blue-700', 'cursor-pointer', 'hover:text-blue-600', 'hover:bg-blue-200', 'rounded', 'px-2', 'py-1', 'mb-1');
                    suggestion.textContent = tag.title;

                    suggestion.addEventListener('click', function() {
                        addTag(tag);
                        tagInput.value = '';
                    });

                    suggestionList.appendChild(suggestion);
                });
            }
        }

        // Add listener to remove tags
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-tag')) {
                e.target.parentElement.remove();
            }
        });
    </script>
</x-app-layout>

<?php

$search = request('search');

?>

<x-app-layout>
    <div class="flex row justify-between">
        <div>
            <form action="{{ route('news.index') }}" method="GET">
                <div class="flex row">
                    <input type="text" name="search" class="px-4 py-2 m-2 bg-white border border-gray-300 rounded shadow focus:outline-none focus:ring focus:border-blue-300" placeholder="Zoekterm">
                    <button type="submit" class="px-4 py-2 m-2 bg-blue-500 text-white rounded hover:bg-blue-600">Zoeken</button>
                </div>
            </form>
        </div>
        <div class="flex row">
            <a href="{{ route('news.create') }}" class="px-4 py-2 m-2 bg-blue-500 text-white rounded hover:bg-blue-600">Plaats Nieuws</a>
        </div>
    </div>
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
                <?php
                $description = $news->description;

                // If the description is longer than 100 characters, shorten it
                $shortened = $description;
                $isShortened = false; // Niet in gebruik
                if (strlen($description) > 100) {
                    $shortened = substr($description, 0, 100) . '...';
                    $isShortened = true;
                }

                ?>
                <p class="text-gray-800">{{ $shortened }}</p>
            </div>
        </a>
    @endforeach
</x-app-layout>

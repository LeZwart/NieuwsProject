<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            /* Include Tailwind CSS */
            @import url('https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css');
        </style>
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div class="w-full max-w-7xl mx-auto sm:px-6 lg:px-8">
                <header class="flex justify-between items-center py-6">
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>

                    @if (Route::has('login'))
                        <nav class="flex space-x-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] bg-orange-400 p-5">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] bg-orange-400 p-5">
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] bg-orange-400 p-5">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </header>

                <main>
                    <div class="bg-white shadow sm:rounded-lg p-6 mt-6">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-4">Welkom op het Nova Nieuws platform</h2>
                        <p class="text-gray-600 mt-2">Dit is een platform waar je nieuwsberichten kunt lezen en schrijven.</p>
                        <br>
                        <p class="text-gray-600 mt-2">Onze gebruikers hebben in totaal <em class="font-bold text-yellow-600">{{ $total_posts }}</em> nieuws artikelen geplaatst</p>
                        <p class="text-gray-600 mt-2">En onze gebruikers hebben in totaal <em class="font-bold text-yellow-600"> {{ $total_comments }} </em> comments geplaatst</p>
                    </div>

                    <div class="bg-white shadow sm:rounded-lg p-6 mt-6">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-4">Laatste nieuws</h2>
                        @foreach ($newsposts as $news)
                            <div class="block p-4 sm:p-8 bg-gray-50 shadow sm:rounded-lg mb-4 shadow-md">
                                <div class="max-w-xl">
                                    <h3 class="text-xl font-semibold text-gray-900">{{ $news->title }}</h3>
                                    <div class="text-gray-600 text-sm">
                                        <span>{{ $news->created_at->format('M d, Y') }}</span>
                                        <span> // </span>
                                        <span>{{ $news->author->name }}</span>
                                    </div>
                                    <div class="mt-2">
                                        <span class="inline-block bg-blue-200 rounded-full px-3 py-1 text-sm font-semibold text-cyan-700 mr-2">{{ $news->category->title }}</span>
                                        @foreach ($news->tags as $tag)
                                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $tag->title }}</span>
                                        @endforeach
                                    </div>
                                    {{-- <p class="text-gray-800 mt-2">{{ $news->description }}</p> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>

<x-app-layout>
    <div class="flex items-center justify-center min-h-screen">
        <div class="text-center bg-white p-5 shadow-md rounded-md">
            <h1 class="text-xl">Globale statistieken</h1>
            <div class="mt-4">
                <p>Aantal nieuws artikelen: {{ $total_posts }}</p>
                <p>Aantal categorieën: {{ $total_categories }}</p>
                <p>Aantal tags: {{ $total_tags }}</p>
            </div>

            <hr class="w-1/1.5 m-auto mt-4 mb-4">

            <h2 class="text-xl">Jouw statistieken</h2>
            <div class="mt-4">
                <p>Aantal nieuws artikelen: {{ count(Auth::user()->news) }}</p>
                <p>Aantal reacties: {{ count(Auth::user()->comments) }}</p>
            </div>
        </div>
    </div>
</x-app-layout>

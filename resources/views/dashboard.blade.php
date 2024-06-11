<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="text-xl text-center">Hallo, {{ Auth::user()->name }}</p>
                    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                    <div>
                        <div class="flex space-x-8 mt-4 bg-slate-200 p-3 w-min">
                            <x-dashboard-button href="{{ route('news.create') }}">Maak een post</x-dashboard-button>
                            <x-dashboard-button href="{{ route('news.index') }}">Bekijk het nieuws</x-button>
                        </div>
                        <div class="flex space-x-8 mt-4 bg-slate-200 p-3 w-min">
                            <x-dashboard-button href="{{ route('category.create') }}">Maak een categorie</x-dashboard-button>
                            <x-dashboard-button href="{{ route('category.index') }}">Bekijk de categorieën</x-dashboard-button>
                        </div>
                        <div class="flex space-x-8 mt-4 bg-slate-200 p-3 w-min">
                            <x-dashboard-button href="{{ route('tag.create') }}">Maak een tag</x-dashboard-button>
                            <x-dashboard-button href="{{ route('tag.index') }}">Bekijk de tags</x-dashboard-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

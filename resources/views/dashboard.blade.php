<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="text-xl text-center">Welkom terug, {{ Auth::user()->name }}</p>
                    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                    <div class="flex space-x-8">
                        <a class="bg-blue-600 text-white p-4 rounded-md hover:bg-blue-500" href=" {{ route('news.create') }}">Maak een post</a>
                        <a class="bg-blue-600 text-white p-4 rounded-md hover:bg-blue-500" href=" {{ route('news.index') }} ">Bekijk het nieuws</a>
                        <a class="bg-blue-600 text-white p-4 rounded-md hover:bg-blue-500" href="{{ route('profile.edit') }}">Bekijk je profiel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

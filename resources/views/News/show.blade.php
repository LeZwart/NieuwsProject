<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h1 class="text-2xl font-semibold text-gray-900">{{ $newspost->title }}</h1>
                    <p class="text-gray-600">{{ $newspost->created_at }}</p>
                    <p class="text-gray-800">{{ $newspost->description }}</p>
                </div>
                <a href=""></a>
            </div>
        </div>
    </div>
</x-app-layout>


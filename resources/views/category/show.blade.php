<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h1 class="text-2xl font-semibold text-gray-900">{{ $category->title }}</h1>
                    <div>
                        <span class="text-gray-600">{{ $category->created_at }}</span>
                        <div class="mt-4">
                            <a href="{{ route('category.edit', $category->id) }}" class="text-blue-500 hover:text-blue-700">Bewerk</a>
                            <form action="{{ route('category.delete', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Verwijder</button>
                            </form>
                        </div>
                    </div>
                    <p class="text-gray-800">{{ $category->description }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

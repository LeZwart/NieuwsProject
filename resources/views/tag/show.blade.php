<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @if (@isset($error))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Fout!</strong>
                    <span class="block sm:inline">{{ $error }}</span>
                </div>
                @endif
                <div class="max-w-xl">
                    <h1 class="text-2xl font-semibold text-gray-900">{{ $tag->title }}</h1>
                    <div>
                        <span class="text-gray-600">{{ $tag->created_at }}</span>
                        <div class="mt-4">
                            <a href="{{ route('tag.edit', $tag->id) }}" class="text-blue-500 hover:text-blue-700">Bewerk</a>
                            <form action="{{ route('tag.delete', $tag->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Verwijder</button>
                            </form>
                        </div>
                    </div>
                    <p class="text-gray-800">{{ $tag->description }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

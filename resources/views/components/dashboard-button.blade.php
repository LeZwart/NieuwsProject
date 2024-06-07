<!-- resources/views/components/button.blade.php -->
<a {{ $attributes->merge(['class' => 'bg-blue-600 text-white p-4 rounded-md hover:bg-blue-500 w-80 flex justify-center']) }}>
    {{ $slot }}
</a>

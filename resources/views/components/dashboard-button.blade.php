<!-- resources/views/components/button.blade.php -->
<a {{ $attributes->merge(['class' => 'bg-orange-400 text-white p-4 rounded-md hover:bg-orange-500 w-80 flex justify-center']) }}>
    {{ $slot }}
</a>

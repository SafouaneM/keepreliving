@props([
    'type' => 'text'
])
<input {{ $attributes->merge(['class' => 'mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:ring-indigo-500 focus:outline-none focus:ring-2 sm:text-sm']) }} type="{{ $type }}"/>

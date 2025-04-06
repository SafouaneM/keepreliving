@props([
    'type' => 'text',
    'for' => null,
    'label' => null,

])
<div class="relative">
    @if ($label)
        <label for="{{ $for }}" class="absolute -top-2 left-2 inline-block rounded-lg bg-white px-1 text-xs font-medium text-gray-900">
            {{ $label }}
        </label>
    @endif    <input {{ $attributes->merge(['class' => 'mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:ring-indigo-500 focus:outline-none focus:ring-2 sm:text-sm']) }} type="{{ $type }}"/>
</div>


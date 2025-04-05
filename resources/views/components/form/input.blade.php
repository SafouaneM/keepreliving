@props([
    'type' => 'text'
])
<input {{ $attributes->merge(['class' => 'text-normal rounded-lg']) }} type="{{ $type }}"/>

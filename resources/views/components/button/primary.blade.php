@props([
    'disabled' => false,
    'type' => 'button',
])

<button type="{{ $type }}" {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge([
        'class' => 'w-full text-sm bg-green-500 text-white py-1 rounded hover:bg-green-600 disabled:opacity-50 disabled:cursor-not-allowed' ]) }}>
    {{ $slot }}
</button>


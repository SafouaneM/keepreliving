@props(['name'])

@error ($name)
<div {{ $attributes->merge(['class' => 'text-xs text-red-600 font-normal']) }}>{{ $message }}</div>
@enderror

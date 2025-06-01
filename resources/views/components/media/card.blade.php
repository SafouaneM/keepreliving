@props([
    'media',
    'user' => null,
    'selectedFolder' => null,
])

<div class="border border-gray-200 rounded-2xl overflow-hidden shadow-sm bg-white flex flex-col">
    <div class="w-full aspect-[4/5] bg-gray-100 rounded-t-2xl overflow-hidden">
        <img
            src="{{ $media->getUrl() }}"
            alt="{{ $media->file_name }}"
            class="w-full h-full object-cover object-center transition duration-200 hover:scale-105"
        />
    </div>

    <div class="p-3 flex flex-col gap-3">
        <div class="text-sm text-gray-800 font-medium truncate" title="{{ $media->file_name }}">
            {{ $media->file_name }}
        </div>

        @if ($user && $user->folders->count() > 0)
            <div class="space-y-2">
                <select
                    wire:model.live="selectedFolder.{{ $media->id }}"
                    class="w-full rounded-md border border-gray-300 text-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                >
                    <option value="">Move to folder...</option>
                    @foreach ($user->folders as $folder)
                        <option value="{{ $folder->id }}">{{ $folder->name }}</option>
                    @endforeach
                </select>

                @php
                    $disabled = !($selectedFolder);
                @endphp

                <x-button.primary
                    wire:click="moveMedia({{ $media->id }})"
                    :disabled="$disabled"
                    class="w-full"
                >
                    Move
                </x-button.primary>

                <x-form.error :name="'selectedFolder.' . $media->id" />
            </div>
        @endif
    </div>
</div>

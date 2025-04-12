<div class="max-w-4xl mx-auto mt-10 space-y-6 px-4">
    <form wire:submit.prevent="save" class="space-y-4">
        <x-form.input required type="file" wire:model="form.media" label="File"/>
        <x-form.error name="form.media" />
        <button type="submit" class="w-full rounded-md bg-blue-500 px-4 py-2 hover:bg-blue-600 cursor-pointer text-white">Upload Media</button>
    </form>

    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mt-8">
        @forelse ($target->getMedia($collection) as $media)
            <div class="border rounded-md overflow-hidden shadow-sm">
                <img src="{{ $media->getUrl() }}" alt="{{ $media->name }}" class="w-full h-auto">
                <div class="p-2 text-sm text-gray-700">{{ $media->file_name }}</div>

                @if ($target->user && $target->user->folders->count() > 0)
                    <select wire:model.live="selectedFolder.{{ $media->id }}" class="w-full rounded border-gray-300 text-sm">
                        <option value="">Move to folder...</option>
                        @foreach ($target->user->folders as $folder)
                            <option value="{{ $folder->id }}">{{ $folder->name }}</option>
                        @endforeach
                    </select>

                    @php
                        $disabled = !($selectedFolder[$media->id] ?? false);
                    @endphp

                    <x-button.primary wire:click="moveMedia({{ $media->id }})" :disabled="$disabled">Move</x-button.primary>
                    <x-form.error :name="'selectedFolder.' . $media->id" />
                @endif
            </div>
        @empty
            <p class="text-gray-500 col-span-full text-center">No media uploaded yet :o</p>
        @endforelse
    </div>
</div>

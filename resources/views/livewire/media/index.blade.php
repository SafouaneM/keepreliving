<div class="max-w-4xl mx-auto mt-10 space-y-6 px-4">
    <form wire:submit.prevent="save" class="space-y-4">
        <input type="file" wire:model="form.media" class="block w-full text-sm text-gray-700 border border-gray-300 rounded-md" />
        <x-form.error name="form.media" />
        <button type="submit" class="w-full rounded-md bg-blue-500 px-4 py-2 hover:bg-blue-600 cursor-pointer text-white">Upload Media</button>
    </form>

    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mt-8">
        @forelse ($target->getMedia($collection) as $media)
            <div class="border rounded-md overflow-hidden shadow-sm">
                <img src="{{ $media->getUrl() }}" alt="{{ $media->name }}" class="w-full h-auto">
                <div class="p-2 text-sm text-gray-700">{{ $media->file_name }}</div>
            </div>
        @empty
            <p class="text-gray-500 col-span-full text-center">No media uploaded yet :o</p>
        @endforelse
    </div>
</div>

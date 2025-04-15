<div>
    <div class="relative">
        <div class="flex items-center space-x-4 px-4 pb-0.5 pt-2 text-sm font-medium text-zinc-700 ">
            <x-tabler-search class="w-5 h-5" />
            <button class="pb-2 border-b-2 border-zinc-300">Folders</button>
            <button class="pb-2 hover:border-b-2 hover:border-zinc-300">Favorites</button>
            <button class="pb-2 hover:border-b-2 hover:border-zinc-300">Media</button>
        </div>

        <div class="px-4">
            <div class="border-t border-2 border-zinc-300"></div>
        </div>
    </div>

    <div class="px-4 py-2">
        <p class="text-sm text-gray-800 mb-2">hier results ja</p>
{{--        Layout needs to match the macintosh folder that could look cool with previews from the psatie as well--}}
        <div class="grid grid-cols-2 gap-2">
            @forelse ($user->folders as $folder)
                <div class="border rounded p-3 shadow-sm">
                    <div class="flex flex-row items-center justify-between">
                        <a wire:navigate href="{{ route('folders.show', $folder) }}" class="font-semibold text-zinc-800 truncate">{{ $folder->name }}</a>
                        <p class="text-xs text-zinc-500 whitespace-nowrap">
                            {{ $folder->media->count() }} media items
                        </p>
                    </div>
                </div>
            @empty
                <p class="text-sm text-gray-500 italic">No folders found yet :o</p>
            @endforelse
        </div>
    </div>
</div>



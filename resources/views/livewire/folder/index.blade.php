<div class="max-w-4xl mx-auto mt-10 px-4">
    <div class="bg-white shadow-md rounded-xl p-6 space-y-6 border border-gray-100">
        <div class="border-b border-gray-200 bg-white py-3 flex items-center justify-between rounded-t-xl">
            <h1 class="text-lg font-semibold text-gray-800">
                {{ auth()->user()->username }}'s Folders
            </h1>

            <div class="flex items-center gap-4">
                <a wire:navigate
                    href="{{ route('folders.create') }}"
                    class="inline-flex items-center gap-1 bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-full text-sm font-medium shadow-sm transition">
                    <x-tabler-plus class="w-4 h-4" />
                    Create Folder
                </a>
            </div>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-5 gap-4 mt-5">
            @forelse ($folders as $folder)
                <a wire:navigate href="{{ route('folders.show', $folder->id) }}" class="block rounded-md border border-gray-200 shadow-sm hover:shadow-md transition overflow-hidden bg-white">
                    @if ($folder->preview_url)
                        <div class="w-full h-32 bg-white overflow-hidden flex items-center justify-center">
                            <img
                                src="{{ $folder->preview_url }}"
                                alt="Preview for {{ $folder->name }}"
                                class="w-full h-full object-cover"
                            />
                        </div>
                    @else
                        <div class="w-full h-32 bg-gray-100 flex items-center justify-center text-gray-400 text-sm">
                            No preview
                        </div>
                    @endif

                    <div class="px-3 py-2">
                        <p class="text-sm font-medium truncate">{{ $folder->name }}</p>
                        <p class="text-xs text-gray-500">{{ $folder->media_count }} item{{ $folder->media_count !== 1 ? 's' : '' }}</p>
                    </div>
                </a>
            @empty
                <p class="col-span-full text-center text-gray-500">No folders found</p>
            @endforelse
        </div>
    </div>
</div>

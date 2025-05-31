<div>
    <div class="max-w-4xl mx-auto py-8 space-y-4">
        <h1 class="text-2xl font-bold">{{ $folder->name }}</h1>
        <p class="text-gray-600 mb-4">This folder was shared with you.</p>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            @forelse ($folder->getMedia('uploads') as $item)
                <a href="{{ $item->getFullUrl() }}" target="_blank" class="block group">
                    <img
                        src="{{ $item->getFullUrl('preview') }}"
                        alt="{{ $item->name }}"
                        class="w-full h-48 object-cover rounded shadow group-hover:brightness-75 transition"
                    >
                    <p class="text-xs mt-1 truncate text-gray-600">{{ $item->name }}</p>
                </a>
            @empty
                <p class="col-span-full text-sm text-gray-500">No media found in this folder.</p>
            @endforelse
        </div>

        <div class="mt-6">
            <a href="/" class="text-sm text-blue-500 underline">⬅ Back to homepage</a>
        </div>
    </div>

</div>

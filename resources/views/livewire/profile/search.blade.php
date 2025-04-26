@use (App\Enums\SearchType)
<div class="px-4">
    <div class="flex items-center relative overflow-hidden">
        <div class="flex items-center gap-2">
            <button wire:click="toggleSearch" class="text-blue-400 hover:text-blue-500 transition">
                <x-tabler-search class="w-6 h-6" />
            </button>

            <div class="transition-all duration-500 ease-in-out overflow-hidden"
                 style="{{ $showSearch ? 'width: 12rem; opacity: 1;' : 'width: 0; opacity: 0;' }}">
                <input
                    wire:model.live.debounce="searchText"
                    type="text"
                    placeholder="Search here..."
                    class="w-full px-4 py-2 border border-blue-400 bg-white text-black rounded-lg focus:outline-none">
            </div>
        </div>

        <div class="py-2 flex items-center gap-4 ml-2 transition-all duration-500 ease-in-out">
            @foreach (SearchType::cases() as $type)
                <button
                    wire:click="setSearchType('{{ $type->value }}')"
                    class="relative text-blue-400 hover:text-blue-500 font-semibold transition {{ $searchType === $type ? 'border-b-2 border-blue-400' : '' }}">
                    {{ $type->label() }}
                </button>
            @endforeach
        </div>
    </div>

    <div class="py-2">
        <p class="text-sm text-gray-800 mb-2">Search Results</p>
        <div class="grid grid-cols-2 gap-2">
            @forelse ($this->results as $result)
                <div class="border rounded p-3 shadow-sm">
                    <div class="flex flex-row items-center justify-between">
                        <a href="#"
                           class="font-semibold text-zinc-800 truncate">
                            {{ $result->name }}
                        </a>
                        <p class="text-xs text-zinc-500 whitespace-nowrap">
                            @if ($searchType === SearchType::Folders)
                                {{ $result->media->count() }} media items
                            @elseif ($searchType === SearchType::Media)
                                Uploaded at {{ $result->created_at->format('Y-m-d') }}
                            @endif
                        </p>
                    </div>
                </div>
            @empty
                <p class="text-sm text-gray-500 italic">No results found :o</p>
            @endforelse
        </div>
    </div>
</div>



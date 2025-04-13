{{--// Maybe do this in component no?--}}
@php
    $maxVisible = 5;
    $foldersToShow = $user->folders->take($maxVisible);
@endphp

<div class="fixed bg-gray-50 inset-y-0 left-0 w-64 border-r border-gray-100 shadow-xl flex flex-col p-4 space-y-4 z-50">
    <div class="flex items-center space-x-3">
        <img src="{{ $user->profile_picture ?? 'https://64.media.tumblr.com/60ec6e68e9d55c2f2b6016830f79ff8c/f295d10db465e6e1-74/s96x96u_c1/b6b5e8ed4059177b57d0674a794820243def68b2.jpg' }}" alt="Profile Picture" class="shadow-sm w-10 h-10 rounded-sm object-cover">
        <div class="flex flex-col">
            <a wire:navigate href="{{ route('profile.show', $user->username) }}" class="text-lg font-semibold text-gray-900 hover:underline">
                {{ $user->username }}
            </a>
            <span>{{ $user->status }}</span>
        </div>
    </div>

    <div>
        <a wire:navigate href="{{ route('dashboard') }}" class="block font-bold text-gray-700 hover:text-blue-600">
            KeepReliving
        </a>
    </div>

    <div class="my-1 border-t border-gray-200"></div>

    <div x-data="{ open: true }" class="space-y-2">
        <button @click="open = !open" class="flex items-center justify-between w-full text-left text-sm font-semibold text-gray-700">
            <div class="flex items-center space-x-2 pt-2">
                <x-tabler-folder/>
                <span>Folders</span>
            </div>
            <span :class="{ 'rotate-180': open }" class="transition-transform">
                <x-tabler-chevron-down class="w-4 h-4" />
            </span>
        </button>

        <div x-show="open" class="space-y-1 pl-3">
            @forelse ($foldersToShow as $folder)
                <a href="{{ route('folders.show', $folder) }}" class="flex justify-between items-start text-sm text-gray-600 hover:text-blue-600 pb-1">
                    <span class="break-all max-w-[80%]">{{ $folder->name }}</span>
                    <span class="text-xs bg-gray-200 px-2 py-0.5 rounded whitespace-nowrap">{{ $folder->media->count() }}</span>
                </a>
            @empty
                <span class="text-xs text-gray-400">No folders yet</span>
            @endforelse

            @if ($user->folders->count() > $maxVisible)
                <a wire:navigate href="{{ route('folders') }}" class="text-xs text-blue-500 hover:underline pl-1">
                    + View all folders
                </a>
            @endif

            <div class="my-1 border-t border-gray-200"></div>

            <a wire:navigate href="{{ route('folders.create') }}" class="text-sm text-blue-600 hover:underline block mt-1 pt-1">
                + New Folder
            </a>
        </div>
    </div>

        <a wire:navigate href="#" class="flex items-center space-x-2 text-sm font-semibold text-gray-700 hover:text-blue-600">
            <x-tabler-photo-scan/>
            <span>Your Media</span>
        </a>

        <a wire:navigate href="#" class="flex items-center space-x-2 text-sm font-semibold text-gray-700 hover:text-blue-600">
            <x-tabler-link/>
            <span>Shared Links</span>
        </a>

        <a wire:navigate href="#" class="flex items-center space-x-2 text-sm font-semibold text-gray-700 hover:text-blue-600">
            <x-tabler-settings/>
            <span>Settings</span>
        </a>
</div>

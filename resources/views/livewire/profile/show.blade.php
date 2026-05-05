<div class="shadow-xl drop-shadow-current rounded-lg overflow-hidden ring-2 ring-slate-50 mt-32">
    <div class="relative">
        {{-- Banner --}}
        <img src="{{ $user->banner_image ?? 'https://turbosmurfs.gg/storage/splash/Soraka_37.jpg' }}"
             alt="Banner image"
             class="h-55 w-full object-cover">

        {{-- Avatar --}}
        <div class="absolute left-6 -bottom-12">
            <img src="{{ $user->profile_picture ?? 'https://i2-prod.mirror.co.uk/article24944546.ece/ALTERNATES/s1200c/0_Cristiano-Ronaldo.jpg' }}"
                 alt="Profile picture"
                 class="w-24 h-24 rounded-full border-4 border-white shadow-md object-cover">

            @can('update', $user)
                <div class="absolute bottom-0 right-0 translate-x-1/3 translate-y-1/3 bg-white/80 rounded-full p-1">
                    <livewire:media.index :target="$user" collection="avatar" :show-list="false" />
                </div>
            @endcan
        </div>
    </div>

    <div class="pt-16 px-6 flex flex-col">
        <h1 class="text-xl font-bold text-gray-900 leading-tight">{{ $user->username }}</h1>
        @if ($user->name)
            <a wire:navigate href="{{ route('profile.show', $user->username) }}"
               class="text-sm text-gray-600">{{ '@' . $user->name }}</a>
        @endif
        @if ($user->status)
            <p class="text-sm text-gray-500 italic font-bold">{{ $user->status }}</p>
        @endif
    </div>

    <div class="mt-4">
        <livewire:profile.search :user="$user" />
    </div>
</div>

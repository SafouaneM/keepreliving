<div class="shadow-md rounded-lg overflow-hidden ring-2 ring-slate-50 mt-32">
    <div class="relative">
        <img src="{{ $user->banner_image ?? 'https://i.pinimg.com/originals/36/cf/65/36cf654b6ca6797336878c71dc4eef59.gif' }}" alt="Banner image" class="h-55 w-full object-cover">

        <div class="absolute left-6 -bottom-12">
            <img src="{{ $user->profile_picture ?? 'https://i2-prod.mirror.co.uk/article24944546.ece/ALTERNATES/s1200c/0_Cristiano-Ronaldo.jpg' }}"
                 alt="Profile picture"
                 class="w-24 h-24 rounded-full border-3 border-white object-cover" />
        </div>
    </div>

    <div class="pt-16 px-6 flex flex-col">
        <h1 class="text-xl font-bold text-gray-900 leading-tight">{{ $user->username }}</h1>
        @if($user->name)
            <a wire:navigate href="{{ route('profile.show', $user->username) }}" class="text-sm text-gray-600">{{ '@' . $user->name }}</a>
        @endif
        @if($user->status)
            <p class="text-sm text-gray-500 italic font-bold">{{ $user->status }}</p>
        @endif
    </div>

    <div class="mt-4">
        @livewire('profile.search', ['user' => $user])
    </div>
</div>

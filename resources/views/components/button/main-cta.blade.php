<div>
    <a wire:navigate {{ $attributes->merge(['class' => 'px-4 py-2 rounded-2xl bg-white/70 backdrop-blur-md inline-flex items-center shadow-sm hover:bg-white font-semibold focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-500']) }}>
        {{ $slot }}
    </a>
</div>

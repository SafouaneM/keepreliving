<div>
    @if ($visible)
        <div x-data="{ show: @entangle('visible') }" x-show="show" x-init="
                setTimeout(() => show = false, 2000)" x-transition
            @class([
                'fixed bottom-4 right-4 z-50 px-4 py-3 rounded-md text-white text-sm shadow-md',
                'bg-green-600' => $type === 'success',
                'bg-blue-600' => $type === 'info',
                'bg-red-600' => $type === 'error',
            ])>
            <p class="text-xs text-white mb-1">{{ $type }}</p>
            {{ $message }}
        </div>
    @endif
</div>

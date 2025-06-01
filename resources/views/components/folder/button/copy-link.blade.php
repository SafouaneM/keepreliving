@props([
    'link',
    'label' => 'Copy',
    'disabled' => false,
])

<div x-data="{ copied: false, disabled: false }">
    <button
        class="px-3 py-1 bg-amber-300 hover:bg-amber-400 text-sm font-medium rounded shadow transition duration-200"
        :disabled="disabled || {{ $disabled ? 'true' : 'false' }}"
        :class="{ 'opacity-50 cursor-not-allowed': disabled || {{ $disabled ? 'true' : 'false' }} }"
        x-on:click.prevent="
            if (disabled) return;
            disabled = true;
            navigator.clipboard.writeText('{{ $link }}')
                .then(() => {
                    copied = true;
                    $wire.copyLinkToClipboard();

                    setTimeout(() => {
                        copied = false;
                        disabled = false;
                    }, 2000);
                });
        "
        x-text="copied ? 'Copied!' : '{{ $label }}'"
    ></button>
</div>

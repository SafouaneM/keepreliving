<div>
    <div class="max-w-4xl mx-auto py-6" x-data="{ showShare: false, copied: false }">
        <x-button.main-cta wire:navigate href="{{ route('folders') }}">Back to folders</x-button.main-cta>

        <h1 class="text-2xl font-semibold mt-4">{{ $folder->name }}</h1>

        <div class="mt-4">
            <a @click="showShare = !showShare" class="text-blue-600 underline cursor-pointer">
                <span x-text="showShare ? 'Cancel' : 'Generate shareable link'"></span>
            </a>

            <div x-show="showShare" x-transition class="mt-4 border p-4 rounded bg-gray-50 space-y-4">
                <x-form.input
                    for="expires" label="Expires at" type="date" wire:model="expiresAt"
                />

                <div>
                    <label for="permission" class="text-sm font-medium text-gray-700">Permission</label>
                    <select wire:model="permission" id="permission" class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:ring-indigo-500 focus:outline-none focus:ring-2 sm:text-sm">
                        @foreach (\App\Enums\SharePermissions::cases() as $permissions)
                            <option value="{{ $permissions->value }}">{{ $permissions->label() }}</option>
                        @endforeach
                    </select>
                </div>

                <x-button.primary wire:click="generateShareLink">Generate Link</x-button.primary>
            </div>

            @if ($shareToken)
                <div class="mt-6 bg-green-50 p-4 rounded border text-sm">
                    <p class="font-medium">Your shareable link:</p>
                    <div class="flex items-center justify-between mt-2">
                        <code class="break-all text-gray-700">{{ route('folders.shared', $shareToken) }}</code>
                            <button
                                class="px-3 py-1 bg-amber-300 hover:bg-amber-400 text-sm font-medium rounded shadow transition duration-200"
                                x-data="{ copied: false, disabled: false }"
                                x-on:click.prevent="
                                if (disabled) return;
                                disabled = true;
                                $wire.copyLinkToClipboard()
                                .then(() =>
                                {
                                 navigator.clipboard.writeText($wire.shareLink);
                                 copied = true;
                                 setTimeout(() => copied = false, 2000);
                                 setTimeout(() => disabled = false, 2000);
                                })"
                                :disabled="disabled"
                                :class="{ 'opacity-50 cursor-not-allowed': disabled }"
                                x-text="copied ? 'Copied!' : 'Copy'"
                            ></button>
                        </div>
                    </div>
                </div>
            @endif

        </div>

        <div class="mt-8">
            <livewire:media.index :target="$folder" collection="uploads"/>
        </div>
    </div>

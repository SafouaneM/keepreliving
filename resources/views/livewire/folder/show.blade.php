<div>
    <div class="max-w-4xl mx-auto py-6" x-data="{ showShare: false }">
        <x-button.main-cta wire:navigate href="{{ route('folders') }}">Back to folders</x-button.main-cta>

        <h1 class="text-2xl font-semibold mt-4">{{ $folder->name }}</h1>

        <div class="mt-4">
            <a @click="showShare = !showShare"
               class="text-blue-600 underline cursor-pointer font-medium transition hover:text-blue-800">
                <span x-text="showShare ? 'Cancel' : 'Generate shareable link'"></span>
            </a>

            <div x-show="showShare" x-transition class="mt-4 border p-4 rounded bg-gray-50 space-y-4">
                <x-form.input
                    for="expires" label="🗓️ Expires at" type="date" wire:model="expiresAt"
                />

                <div>
                    <x-form.select for="permission" label="🔐 Permission" wire:model="permission">
                        @foreach (\App\Enums\SharePermissions::cases() as $permissions)
                            <option value="{{ $permissions->value }}">{{ $permissions->label() }}</option>
                        @endforeach
                    </x-form.select>
                </div>

                <x-button.primary wire:click="generateShareLink" wire:target="generateShareLink" wire:loading.attr="disabled">
                    <span wire:loading.remove>Generate Link</span>
                    <span wire:loading>
                        <x-tabler-loader class="animate-spin text-white"/>
                    </span>
                </x-button.primary>
            </div>

            @if ($shareToken)
                <div class="mt-6 p-4 rounded border text-sm
                 {{ $folder->tokenIsExpired() ? 'bg-red-50 border-red-500' : 'bg-green-50 border-green-200' }}">
                    <p class="font-medium">Your shareable link:</p>
                    @if($folder->tokenIsExpired())
                        <p class="text-red-600 font-semibold">This link has expired. Please generate a new one.</p>
                    @endif
                    <div class="flex items-center justify-between mt-2">
                        <code class="break-all text-gray-700">{{ route('folders.shared', $shareToken) }}</code>
                        <x-folder.button.copy-link
                            :link="route('folders.shared', $shareToken)"
                            label="Copy"
                            :disabled="$folder->tokenIsExpired()"
                        />
                    </div>
                </div>
        </div>
        @endif

    </div>

    <div class="mt-8">
        <livewire:media.index :target="$folder" collection="uploads"/>
    </div>
</div>


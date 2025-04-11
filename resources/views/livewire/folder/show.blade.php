<div>
    <button wire:navigate href="{{ route('folders') }}">Go back</button>
    <p>{{ $this->folder->name }} folder here</p>
    <div>
    <livewire:media.index :target="$folder" collection="uploads"/>
    </div>
</div>

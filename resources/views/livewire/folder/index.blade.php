<div class="max-w-4xl mx-auto mt-10 space-y-6 px-4">
    <p>folders here</p>
    <button class="bg-green-300" wire:navigate href="{{route('folders.create')}}">Click me to make a new folder</button>
    @forelse($this->folders as $folder)
        <a wire:navigate href="{{route('folders.show', $folder->id)}}"><p>{{$folder->name}}</p></a>
    @empty
        <p>No folders found</p>
    @endforelse
</div>

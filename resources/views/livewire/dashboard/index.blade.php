<div>
    @if (auth()->user())
        <p>yoo ingelogd</p>
        <form wire:submit.prevent="logOut">
            <button type="submit">Logout</button>
        </form>
        <button class="bg-green-300" wire:navigate href="{{route('folders')}}">Click here to go to your folders</button>
        <livewire:media.index :target="auth()->user()" collection="uploads"/>
    @else
        <p>yoo homepageee</p>
    @endif

</div>

<div>
    @if (auth()->user())
        <p>yoo ingelogd</p>
        <form wire:submit.prevent="logOut">
            <button type="submit">Logout</button>
        </form>
        <livewire:dashboard.sidebar />
        <livewire:media.index/>
    @else
        <p>yoo homepageee</p>
    @endif

</div>

<div>
    @if (auth()->user())
        <p>yoo ingelogd</p>
        <form wire:submit.prevent="logOut">
            <button type="submit">Logout</button>
        </form>
        <livewire:dashboard.sidebar />
    @else
        <p>yoo homepageee</p>
    @endif

</div>

<div>
    @if(auth()->user())
        <p>yoo ingelogd</p>
        <form wire:submit.prevent="logOut">
            <button type="submit">Logout</button>
        </form>
    @else
        <p>yoo homepageee</p>
    @endif

</div>

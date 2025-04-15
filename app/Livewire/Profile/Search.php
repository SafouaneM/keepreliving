<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Livewire\Component;

class Search extends Component
{
    public User $user;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function search()
    {
        // Todo maybe we can do it with a form -> search or we just do it here idk
    }

    public function render()
    {
        return view('livewire.profile.search');
    }
}

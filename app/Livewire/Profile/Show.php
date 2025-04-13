<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public User $user;
    public string $username;

    public function mount(): void
    {
        $this->user = User::where('username', $this->username)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.profile.show');
    }
}

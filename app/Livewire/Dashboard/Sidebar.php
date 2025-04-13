<?php

namespace App\Livewire\Dashboard;

use App\Models\Folder;
use App\Models\User;
use Livewire\Component;

class Sidebar extends Component
{
    public User $user;
    public ?Folder $folder = null;

    public function mount(): void
    {
        $this->user = auth()->user();
        $this->folder = Folder::where('user_id', $this->user->id)->first();
    }

    public function render()
    {
        return view('livewire.dashboard.sidebar');
    }
}

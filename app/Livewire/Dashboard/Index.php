<?php

namespace App\Livewire\Dashboard;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function logOut()
    {
        if (Auth::check()) {
            Auth::logout();
            session()->invalidate();
            session()->regenerateToken();
            session()->flash('message', 'Logout successful!');
        } else {
            session()->flash('error', 'You are not logged in.');
        }

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.dashboard.index');
    }
}

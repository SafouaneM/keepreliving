<?php

namespace App\Livewire\Home;

use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    #[Title('Home')]
    public function render()
    {
        return view('livewire.home.index')->layout('components.layouts.guest');
    }
}

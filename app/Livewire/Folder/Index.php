<?php

namespace App\Livewire\Folder;

use Livewire\Component;

class Index extends Component
{
    public $folders;

    public function mount()
    {
        $folders = auth()->user()->folders;
        $this->folders = $folders;
    }

    public function render()
    {
        return view('livewire.folder.index');
    }
}

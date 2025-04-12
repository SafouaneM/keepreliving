<?php

namespace App\Livewire\Folder;

use App\Livewire\Folder\Forms\CreateForm;
use Livewire\Component;

class Create extends Component
{
    public CreateForm $form;

    public function mount()
    {
        $this->form->user = auth()->user();
    }

    public function save()
    {
        $this->form->create();
    }

    public function render()
    {
        return view('livewire.folder.create');
    }
}

<?php

namespace App\Livewire\Folder;

use App\Livewire\Folder\Forms\CreateForm;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

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
        Toaster::success('Folder created successfully.');
    }

    public function render()
    {
        return view('livewire.folder.create');
    }
}

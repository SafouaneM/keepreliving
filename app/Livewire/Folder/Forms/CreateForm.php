<?php

namespace App\Livewire\Folder\Forms;

use App\Models\Folder;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateForm extends Form
{
    public User $user;
    public Folder $folder;
    //ugli
    #[Validate('required|string|min:2|max:64|unique:folders,name')]
    public $name;

    public function create()
    {
        $this->validate();

        $folder = Folder::create([
            'name' => $this->name,
            'user_id' => $this->user->id,
        ]);

        return redirect()->route('folders.show', $folder);

    }
}

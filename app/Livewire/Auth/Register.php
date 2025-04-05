<?php

namespace App\Livewire\Auth;

use App\Livewire\Auth\Forms\RegisterForm;
use Livewire\Component;

class Register extends Component
{
    public RegisterForm $form;

    public function save()
    {
        $this->form->save();
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}

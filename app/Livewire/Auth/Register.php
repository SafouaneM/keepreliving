<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Livewire\Auth\Forms\RegisterForm;


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

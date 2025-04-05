<?php

namespace App\Livewire\Auth;

use App\Livewire\Auth\Forms\LoginForm;
use Livewire\Component;

class Login extends Component
{
    public LoginForm $form;

    public function save(): void
    {
        $this->form->authenticate();
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}

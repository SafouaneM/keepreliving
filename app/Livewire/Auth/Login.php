<?php

namespace App\Livewire\Auth;

use App\Livewire\Auth\Forms\LoginForm;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{
    public LoginForm $form;

    public function save(): void
    {
        $this->form->authenticate();
    }

    #[Title('Login')]
    public function render()
    {
        return view('livewire.auth.login');
    }
}

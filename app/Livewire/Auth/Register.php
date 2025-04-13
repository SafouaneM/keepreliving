<?php

namespace App\Livewire\Auth;

use App\Livewire\Auth\Forms\RegisterForm;
use Livewire\Attributes\Title;
use Livewire\Component;

class Register extends Component
{
    public RegisterForm $form;

    public function save()
    {
        $this->form->save();
    }

    #[Title('Register')]
    public function render()
    {
        return view('livewire.auth.register')->layout('components.layouts.guest');
    }
}

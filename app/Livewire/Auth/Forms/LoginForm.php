<?php

declare(strict_types=1);

namespace App\Livewire\Auth\Forms;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string|min:8')]
    public string $password = '';

    public function authenticate()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();

            return redirect()->route('dashboard');
        }

        session()->flash('error', 'These credentials do not match our records.');

        return redirect()->route('dashboard');
    }
}

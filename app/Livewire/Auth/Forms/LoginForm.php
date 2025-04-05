<?php

declare(strict_types=1);

namespace App\Livewire\Auth\Forms;


use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    #[Validate('required', 'email')]
    public string $email = '';

    #[Validate('required')]
    public string $password = '';

    public function authenticate()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->flash('message', 'Login successful!');
            return redirect()->route('dashboard');
        } else {
            session()->flash('error', 'Invalid credentials.');
        }
        return redirect()->route('login');
    }

}

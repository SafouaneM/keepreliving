<?php

declare(strict_types=1);

namespace App\Livewire\Auth\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RegisterForm extends Form
{
    #[Validate('required|string|email|unique:users,email')]
    public string $email = '';

    #[Validate('required|string|min:8')]
    public string $password = '';

    #[Validate('required|string|max:25')]
    public string $name = '';

    public function save()
    {
        $this->validate();
        $user = User::create($this->all());

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}

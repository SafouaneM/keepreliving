<?php

declare(strict_types=1);

namespace App\Livewire\Auth\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RegisterForm extends Form
{
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string|min:8')]
    public string $password = '';

    #[Validate('required|string|max:25')]
    public string $name = '';

    public function save(): void
    {
        $this->validate();
        User::create($this->all());
        $this->reset();
    }
}

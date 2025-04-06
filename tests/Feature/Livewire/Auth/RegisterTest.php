<?php

use App\Livewire\Auth\Register;
use App\Models\User;

it('renders correctly', function () {
    Livewire::test('auth.register')
        ->assertStatus(200);
});

it('can register a valid user', function () {
    $user = User::factory()->make();

    Livewire::test(Register::class)
        ->set('form.email', $user->email)
        ->set('form.password', 'password')
        ->set('form.name', $user->name)
        ->call('save')
        ->assertHasNoErrors();
});

it('cant register an invalid user', function () {
    User::factory()->create(['email' => 'nani23@gmail.com']);
    Livewire::test(Register::class)
        ->set('form.email', 'nani23@gmail.com')
        ->set('form.password', 'password')
        ->set('form.name', 'Safouane')
        ->call('save')
        ->assertHasErrors();
});

it('cant register a user who uses the same email as an already existing user', function () {
    User::factory()->create([
        'email' => 'safouane@vanmij.com',
    ]);

    Livewire::test(Register::class)
        ->set('form.email', 'safouane@vanmij.com')
        ->set('form.password', 'password123')
        ->set('form.name', 'Za warudo')
        ->call('save')
        ->assertHasErrors();
});



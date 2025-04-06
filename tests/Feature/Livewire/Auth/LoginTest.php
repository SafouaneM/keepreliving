<?php

use App\Livewire\Auth\Login;
use App\Models\User;

it('renders correctly', function () {
    Livewire::test(Login::class)
        ->assertStatus(200);
});

it('can login valid user', function () {
    $user = User::factory()->create();

    Livewire::test(Login::class)
        ->set('form.email', $user->email)
        ->set('form.password', 'password')
        ->call('save')
        ->assertRedirect('dashboard');
});

it('cannot login invalid user', function () {
    $user = User::factory()->create([
        'email' => 'nani23.com',
    ]);

    Livewire::test(Login::class)
        ->set('form.email', $user->email)
        ->set('form.password', 'password')
        ->call('save')
        ->assertHasErrors();
});

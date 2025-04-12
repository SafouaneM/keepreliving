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
        ->assertRedirect('home');
});

it('cannot login invalid user', function () {
    $user = User::factory()->create([
        'email' => 'nani23@gmail.com',
        'password' => bcrypt('password'),
    ]);

    Livewire::test(Login::class)
        ->set('form.email', $user->email)
        ->set('form.password', 'password2')
        ->call('save')
        ->assertSee('These credentials do not match our records.');
});

<?php

use App\Livewire\Folder\Create;
use App\Models\Folder;
use App\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});

it('renders correctly', function () {
    Livewire::test(Create::class, ['user' => $this->user])
        ->assertStatus(200);
});

it('can create a valid folder', function () {
    Livewire::test(Create::class, ['user' => $this->user])
        ->set('form.name', 'Baita Zituna')
        ->call('save')
        ->assertRedirect(route('folders.show', ['folder' => 1]));
});

it('can create a folder in the database and links it to the user', function () {
    Livewire::test(Create::class)
        ->set('form.name', 'Smoeltjes')
        ->call('save');

    $this->assertDatabaseHas('folders', [
        'name' => 'Smoeltjes',
        'user_id' => $this->user->id,
    ]);
});

it('can create a folder with special characters', function () {
    Livewire::test(Create::class, ['user' => $this->user])
        ->set('form.name', 'Summer memories 2023 ☀️🇲🇦️')
        ->call('save')
        ->assertRedirect();
});

it('cannnot create a folder with 1 character', function () {
    Livewire::test(Create::class, ['user' => $this->user])
        ->set('form.name', 'B')
        ->call('save')
        ->assertHasErrors();
});

it('cannot create a folder with a name that is too long', function () {
    Livewire::test(Create::class)
        ->set('form.name', 'We Saiyans have no limits, lets charge at them with full power!')
        ->call('save')
        ->assertHasErrors();
});

it('cannot create a folder that already exists for the same user', function () {
    Folder::factory()->create([
        'name' => 'Za warudo',
        'user_id' => $this->user->id,
    ]);

    Livewire::test(Create::class)
        ->set('form.name', 'Za warudo')
        ->call('save')
        ->assertHasErrors();
});

it('cannot create a folder without a name', function () {
    Livewire::test(Create::class)
        ->set('form.name', '')
        ->call('save')
        ->assertHasErrors();
});

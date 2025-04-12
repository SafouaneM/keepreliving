<?php

use App\Livewire\Folder\Index;
use App\Models\Folder;
use App\Models\User;

beforeEach(function () {
    $this->user1 = User::factory()->create();
    $this->user2 = User::factory()->create();

    Folder::factory()->for($this->user1)->create([
        'name' => 'Chicken jockey folder',
    ]);

    Folder::factory()->for($this->user2)->create([
        'name' => 'Vuursteen en staal folder',
    ]);
});

it('renders correctly', function () {
    $this->actingAs($this->user1);
    Livewire::test(Index::class)
        ->assertStatus(200);
});

it('only shows folders belonging to the authenticated user', function () {
    $this->actingAs($this->user1);

    Livewire::test(Index::class)
        ->assertSee('Chicken jockey folder')
        ->assertDontSee('Vuursteen en staal folder');
});

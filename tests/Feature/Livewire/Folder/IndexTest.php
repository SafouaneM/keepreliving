<?php


use App\Models\User;

beforeEach(function () {
    $this->actingAs(User::factory()->create());
    $this->user = auth()->user();
    $this->folders = $this->user->folders;
});

it('renders correctly', function () {
    Livewire::test('home.index')
        ->assertStatus(200);
});

it('can show folders of user', function () {

});

<?php

use App\Livewire\Folder\Show;
use App\Models\Folder;
use App\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->folder = Folder::factory()->for($this->user)->create([
        'name' => 'Bombocats folder',
    ]);

    $this->folder2 = Folder::factory()->for($this->user)->create([
        'name' => 'Irrelevant folder',
    ]);

    $this->folder
        ->addMediaFromUrl('https://i1.sndcdn.com/artworks-yy3lrILLGGyL5CgJ-RHdkQA-t500x500.png')
        ->usingFileName('flinty.jpg')
        ->toMediaCollection('uploads');

    $this->folder2
        ->addMediaFromUrl('https://www.youtube.com/watch?v=xvFZjo5PgG0')
        ->usingFileName('rolling.mp4')
        ->toMediaCollection('uploads');

    $this->actingAs($this->user);

});

it('renders correctly', function () {
    Livewire::test(Show::class, ['folder' => $this->folder])
        ->assertStatus(200);
});

it('can show uploaded files unique to the folder', function () {
    Livewire::test(Show::class, ['folder' => $this->folder])
        ->assertSee('flinty.jpg')
        ->assertDontSee('rolling.mp4');
});

it('forbids access to a folder not owned by the user', function () {
    $otherUser = User::factory()->create();
    $unauthorizedFolder = Folder::factory()->for($otherUser)->create();

    $this->actingAs($this->user);

    Livewire::test(Show::class, ['folder' => $unauthorizedFolder])
        ->assertForbidden();
});

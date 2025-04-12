<?php

use App\Livewire\Media\Index;
use App\Models\Folder;
use App\Models\User;
use Illuminate\Http\UploadedFile;

beforeEach(function () {
    Storage::fake('public');
    $this->user = User::factory()->create();
    $this->folder = Folder::factory()->for($this->user)->create();

    $this->actingAs($this->user);
});

it('renders correctly', function () {
    Livewire::test(Index::class, ['target' => $this->user, 'collection' => 'uploads'])
        ->assertStatus(200);
});

it('moves media to the selected folder', function () {
    $moveThisFolder = Folder::factory()->for($this->user)->create();

    $mediaToMove = $moveThisFolder->addMedia(UploadedFile::fake()->image('move.jpg'))
        ->toMediaCollection('uploads');

    Livewire::test(Index::class, ['target' => $moveThisFolder, 'collection' => 'uploads'])
        ->set("selectedFolder.{$mediaToMove->id}", $this->folder->id)
        ->call('moveMedia', $mediaToMove->id);

    expect($this->folder->getMedia('uploads')->pluck('file_name'))->toContain($mediaToMove->file_name);
});

it('cannot move media to a folder that already containts the same media', function () {
    $mediaToMove = $this->folder->addMedia(UploadedFile::fake()->image('move.jpg'))
        ->toMediaCollection('uploads');

    Livewire::test(Index::class, ['target' => $this->folder, 'collection' => 'uploads'])
        ->set("selectedFolder.{$mediaToMove->id}", $this->folder->id)
        ->call('moveMedia', $mediaToMove->id)
        ->assertHasErrors();
});

it('shows an error if no folder is selected', function () {
    $media = $this->user->addMedia(
        UploadedFile::fake()->image('missing-folder.jpg')
    )->toMediaCollection('uploads');

    Livewire::test(Index::class, ['target' => $this->user, 'collection' => 'uploads'])
        ->set('selectedFolder.' . $media->id)
        ->call('moveMedia', $media->id)
        ->assertHasErrors();
});

it('can upload a file and attach it to the user', function () {
    $file = UploadedFile::fake()->image('Enderpearl.jpg');

    Livewire::test(Index::class, ['target' => $this->user, 'collection' => 'uploads'])
        ->set('form.media', $file)
        ->call('save')
        ->assertHasNoErrors();

    $this->user->refresh();

    $media = $this->user->getMedia('uploads');

    expect($media)->toHaveCount(1)
        ->and($media->first()->file_name)->toBe('Enderpearl.jpg');
});

it('can upload a file and attach it to a folder', function () {
    $file = UploadedFile::fake()->image('AADrink.jpg');

    Livewire::test(Index::class, ['target' => $this->folder, 'collection' => 'uploads'])
        ->set('form.media', $file)
        ->call('save')
        ->assertHasNoErrors();

    $this->folder->refresh();
    $media = $this->folder->getMedia('uploads');

    expect($media)->toHaveCount(1)
        ->and($media->first()->file_name)->toBe('AADrink.jpg');
});

it('can upload a file and attach it to a folder and prove it belongs to the authenticated user', function () {
    $file = UploadedFile::fake()->image('craftingtable.jpg');

    Livewire::test(Index::class, ['target' => $this->folder, 'collection' => 'uploads'])
        ->set('form.media', $file)
        ->call('save')
        ->assertHasNoErrors();

    $this->folder->refresh();
    $media = $this->folder->getMedia('uploads');

    expect($media)->toHaveCount(1)
        ->and($media->first()->file_name)->toBe('craftingtable.jpg')
        ->and($this->folder->user_id)->toBe(auth()->id());
});

it('cannot upload invalid media', function () {
    $file = UploadedFile::fake()->create('lostchapter.txt');

    Livewire::test(Index::class, ['target' => $this->user, 'collection' => 'uploads'])
        ->set('form.media', $file)
        ->call('save')
        ->assertHasErrors();
});

it('cannot upload too big media', function () {
    $file = UploadedFile::fake()->image('BigJackBlack.jpg')->size(100000);

    Livewire::test(Index::class, ['target' => $this->user, 'collection' => 'uploads'])
        ->set('form.media', $file)
        ->call('save')
        ->assertHasErrors();
});

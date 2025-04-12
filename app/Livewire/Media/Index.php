<?php

namespace App\Livewire\Media;

use App\Livewire\Media\Forms\Upload;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Index extends Component
{
    use WithFileUploads;

    public Upload $form;
    public HasMedia $target;
    public ?string $collection = null;
    public array $selectedFolder = [];

    public function mount(HasMedia $target): void
    {
        $this->target = $target;

        $this->form->target = $this->target;
        $this->form->collectionName = $this->collection;
    }

    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function save(): void
    {
        $this->form->uploadMedia();
    }

    public function moveMedia(int $mediaId)
    {
        $folderId = $this->selectedFolder[$mediaId];

        if (! $folderId) {
            throw ValidationException::withMessages([
                "selectedFolder.{$mediaId}" => 'Please select a folder first.',
            ]);
        }

        $media = Media::find($mediaId);
        $folder = $this->target->user->folders()->where('id', $folderId)->first();

        if ($folder->media()->where('id', $mediaId)->exists()) {
            throw ValidationException::withMessages([
                "selectedFolder.{$mediaId}" => 'This media already exists in the folder.',
            ]);
        }

        $media->move($folder, $media->collection_name);
        $this->dispatch('toast', message: 'Media moved to "' . $folder->name . '"', type: 'success');
    }

    public function render()
    {
        return view('livewire.media.index');
    }
}

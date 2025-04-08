<?php

namespace App\Livewire\Media;

use App\Livewire\Media\Forms\Upload;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class Index extends Component
{
    use WithFileUploads;

    public Upload $form;
    public $mediaItems;

    public function mount()
    {
        $this->mediaItems = auth()->user()->getMedia('uploads');
    }

    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function save(): void
    {
        $this->form->uploadMedia();
        Toaster::success('Media uploaded successfully');
    }

    public function render()
    {
        return view('livewire.media.index');
    }
}

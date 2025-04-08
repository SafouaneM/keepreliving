<?php

namespace App\Livewire\Media\Forms;

use App\Rules\MediaValidator;
use Livewire\Form;
use Livewire\Attributes\Validate;
use Masmerise\Toaster\Toaster;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class Upload extends Form
{
    #[Validate(['required', 'file', 'max:10240', new MediaValidator()])]
    public $media;

    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function uploadMedia()
    {
        $this->validate();
        auth()->user()
            ->addMedia($this->media->getRealPath())
            ->usingFileName($this->media->getClientOriginalName())
            ->toMediaCollection('uploads');

        $this->reset();
    }
}

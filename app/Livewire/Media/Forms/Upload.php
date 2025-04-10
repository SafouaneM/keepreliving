<?php

namespace App\Livewire\Media\Forms;

use App\Rules\MediaValidator;
use Livewire\Form;
use Livewire\Attributes\Validate;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class Upload extends Form
{
    #[Validate(['required', 'file', 'max:10240', new MediaValidator()])]
    public $media;

    public HasMedia $target;
    public ?string $collectionName = null;

    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function uploadMedia()
    {
        $this->validate();

        $collection = $this->collectionName ?? 'uploads';

        $this->target
            ->addMedia($this->media->getRealPath())
            ->usingFileName($this->media->getClientOriginalName())
            ->toMediaCollection($collection);
    }
}

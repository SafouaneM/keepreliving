<?php

namespace App\Livewire\Media;

use App\Livewire\Media\Forms\Upload;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class Index extends Component
{
    use WithFileUploads;

    public Upload $form;
    public HasMedia $target;
    public ?string $collection = null;

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

    public function render()
    {
        return view('livewire.media.index');
    }
}

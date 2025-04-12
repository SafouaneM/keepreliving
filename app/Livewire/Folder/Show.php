<?php

namespace App\Livewire\Folder;

use App\Livewire\Media\Forms\Upload;
use App\Models\Folder;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class Show extends Component
{
    use WithFileUploads;

    public Folder $folder;
    public Upload $form;

    public function mount(Folder $folder): void
    {
        abort_if($folder->user_id !== auth()->id(), 403);

        $this->folder = $folder;
    }

    #[Title('Folder')]
    public function render()
    {
        return view('livewire.folder.show');
    }
}

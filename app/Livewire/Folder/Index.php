<?php

namespace App\Livewire\Folder;

use Livewire\Component;

class Index extends Component
{
    public $folders;

    public function mount()
    {
        $folders = auth()->user()->folders;
        $this->folders = $folders->map(function ($folder) {
            $folder->preview_url = $folder->getFirstMediaUrl('uploads','preview') ?: null;
            $folder->media_count = $folder->getMedia('uploads')->count();
            return $folder;
        });
    }

    public function render()
    {
        return view('livewire.folder.index');
    }
}

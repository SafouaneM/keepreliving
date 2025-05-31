<?php

namespace App\Livewire\Folder\Shared;

use App\Models\Folder;
use Livewire\Component;

class View extends Component
{
    public Folder $folder;

    public function mount(string $share_token): void
    {
        $this->folder = Folder::where('share_token', $share_token)->firstOrFail();

        if ($this->folder->token_expires_at && $this->folder->token_expires_at->isPast()) {
            abort(410, 'This share link has expired.');
        }
    }

    public function render()
    {
        return view('livewire.folder.shared.view')->title("Shared Folder: {$this->folder->name}");
    }
}

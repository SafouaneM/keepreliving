<?php

namespace App\Livewire\Folder;

use App\Enums\SharePermissions;
use App\Livewire\Media\Forms\Upload;
use App\Models\Folder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;

class Show extends Component
{
    use WithFileUploads;

    public Folder $folder;
    public Upload $form;
    public ?string $expiresAt;
    public ?string $shareToken;
    public string $shareLink;
    public SharePermissions $permission;

    public function mount(Folder $folder): void
    {
        abort_if($folder->user_id !== auth()->id(), 403);

        $this->folder = $folder;

        $this->shareToken = $folder->share_token;
        $this->expiresAt = $folder->token_expires_at
            ? $folder->token_expires_at->toDateString()
            : now()->addDays(7)->toDateString();

        $this->permission = $folder->share_permission ?? SharePermissions::View;
    }

    public function generateShareLink(): void
    {
        $this->folder->update([
            'share_token' => Str::random(20),
            'token_expires_at' => $this->expiresAt ? Carbon::parse($this->expiresAt) : null,
            'share_permission' => $this->permission,
            'shared_by_user_id' => auth()->id(),
        ]);

        $this->shareToken = $this->folder->share_token;
        Toaster::success('Share link generated successfully.');
    }

    public function copyLinkToClipboard(): void
    {
        $this->shareLink = route('folders.shared', ['share_token' => $this->shareToken]);
        Toaster::info('Copied share link to clipboard.');
    }

    #[Title('Folder')]
    public function render()
    {
        return view('livewire.folder.show');
    }
}

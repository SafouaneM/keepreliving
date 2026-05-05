<?php

namespace App\Livewire\Profile\Media;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Spatie\LivewireFilepond\WithFilePond;

class AvatarUpload extends Component
{
    use WithFileUploads, WithFilePond;

    public int $userId;
    #[Rule('nullable|image|mimes:jpg,jpeg,png,webp|max:2048')]
    public $avatar;

    public function mount(int $userId) : void
    {
        $this->userId = $userId;
    }

    public function updatedAvatar(): void
    {
        $user = User::findOrFail($this->userId);

        if ($this->avatar) {
            $user->addMedia($this->avatar->getRealPath())
                ->usingFileName($this->avatar->getClientOriginalName())
                ->toMediaCollection('avatar');

            $this->dispatch('profile-media-updated', type: 'avatar');
            $this->reset('avatar');
        }
    }

    public function render()
    {
        return view('livewire.profile.media.avatar-upload');
    }
}

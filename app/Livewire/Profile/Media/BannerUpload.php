<?php

namespace App\Livewire\Profile\Media;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Spatie\LivewireFilepond\WithFilePond;

class BannerUpload extends Component
{
    use WithFileUploads, WithFilePond;

    public int $userId;
    #[Rule('nullable|image|mimes:jpg,jpeg,png,webp,gif|max:4048')]
    public $banner;

    public function mount($userId) : void
    {
        $this->userId = $userId;
    }

    public function updatedBanner() : void
    {
        $user = User::findorFail($this->userId);

        if ($this->banner) {
            $user->addMedia($this->banner->getRealPath())
                ->usingFileName($this->banner->getClientOriginalName())
                ->toMediaCollection('banner');

            $this->dispatch('profile-media-updated', type: 'banner');
            $this->reset('banner');
        }
    }

    public function render()
    {
        return view('livewire.profile.media.banner-upload');
    }
}

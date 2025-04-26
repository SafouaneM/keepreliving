<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\User;
use App\Enums\SearchType;

class Search extends Component
{
    public User $user;
    public string $searchText = '';
    public SearchType $searchType = SearchType::Folders;
    public bool $showSearch = false;

    public function toggleSearch()
    {
        $this->showSearch = !$this->showSearch;
    }

    public function setSearchType(SearchType $type): void
    {
        $this->searchType = $type;
    }

    public function getResultsProperty()
    {
        $search = Str::of($this->searchText)->lower();

        return match ($this->searchType) {
            SearchType::Folders => $this->user->folders->filter(fn($folder) =>
                $search->isEmpty() || Str::of($folder->name)->lower()->contains($search)
            ),
            SearchType::Media => $this->user->media->filter(fn($media) =>
                $search->isEmpty() || Str::of($media->name)->lower()->contains($search)
            ),
        };
    }
    public function render()
    {
        return view('livewire.profile.search');
    }
}


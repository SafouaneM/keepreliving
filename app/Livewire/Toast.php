<?php

// TODO THIS IS TEMPORARY, IDK HOW TO FIX THE TOASTER T4 issue :(

namespace App\Livewire;

use Livewire\Component;

class Toast extends Component
{
    public string $message = '';
    public string $type = 'info';
    public bool $visible = false;

    protected $listeners = ['toast' => 'show'];

    public function show(string $message, string $type = 'info'): void
    {
        $this->message = $message;
        $this->type = $type;
        $this->visible = true;
        $this->dispatch('$refresh');
    }

    public function render()
    {
        return view('livewire.toast');
    }
}

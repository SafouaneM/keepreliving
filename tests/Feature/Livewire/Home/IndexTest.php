<?php

declare(strict_types=1);

use App\Livewire\Home\Index;

it('renders correctly', function () {
    Livewire::test(Index::class)
        ->assertStatus(200);
});

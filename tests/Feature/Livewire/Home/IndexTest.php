<?php

declare(strict_types=1);

use App\Models\User;

it('renders correctly', function () {
    Livewire::test('home.index')
        ->assertStatus(200);
});

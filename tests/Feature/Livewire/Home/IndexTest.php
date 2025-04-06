<?php

declare(strict_types=1);

it('renders correctly', function () {
    Livewire::test('home.index')
        ->assertStatus(200);
});

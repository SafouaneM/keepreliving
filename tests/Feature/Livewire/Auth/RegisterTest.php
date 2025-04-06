<?php

it('renders correctly', function () {
    Livewire::test('auth.register')
        ->assertStatus(200);
});

<?php

use App\Enums\SharePermissions;
use App\Models\Folder;

it('can generate and save a share token', function () {
    $token = Str::random(20);
    $folder = Folder::factory()->create([
        'share_token' => $token,
    ]);

    expect($folder->share_token)->toBe($token);
});

it('can create a folder with default share permission', function () {
    $folder = Folder::factory()->create();

    expect($folder->share_permission)->toBeInstanceOf(SharePermissions::class)
        ->and($folder->share_permission)->toBe(SharePermissions::View);
});

it('can check if a folder is shared', function () {
    $folder = Folder::factory()->create([
        'share_token' => Str::random(20),
    ]);

    expect($folder->isShared())->toBeTrue()
        ->and($folder->isNotShared())->toBeFalse()
        ->and($folder->sharedBy)->toBeNull();
});

<?php

namespace App\Models;

use App\Enums\SharePermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Folder extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'user_id',
        'share_token',
        'token_expires_at',
        'share_permission',
        'shared_by_user_id',
    ];

    protected $casts = [
        'token_expires_at' => 'datetime',
        'share_permission' => SharePermissions::class,
    ];

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }

    public function isShared(): bool
    {
        return filled($this->share_token);
    }

    public function isNotShared(): bool
    {
        return ! $this->isShared();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sharedBy()
    {
        return $this->belongsTo(User::class, 'shared_by_user_id');
    }
}

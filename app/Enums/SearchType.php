<?php

namespace App\Enums;

enum SearchType: string
{
    case Folders = 'folders';
    case Media = 'media';

    public function label(): string
    {
        return match ($this) {
            self::Folders => 'Folders',
            self::Media => 'Media',
        };
    }
}

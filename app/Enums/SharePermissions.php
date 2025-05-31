<?php

namespace App\Enums;

enum SharePermissions: string
{
    case View = 'view';
    case Download = 'download';
    case Editable = 'edit';

    public function label(): string
    {
        return match ($this) {
            self::View => 'View only',
            self::Download => 'View and Downloadable',
            self::Editable => 'CRUD Access',
        };
    }
}

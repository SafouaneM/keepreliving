<?php

declare(strict_types=1);

namespace App\Enums;

enum Gender: string
{
    case male = 'male';
    case female = 'female';
    case preferNotToSay = 'prefer_not_to_say';

    public function label(): string
    {
        return match ($this) {
            self::male => 'Male',
            self::female => 'Female',
            self::preferNotToSay => 'Prefer not to say',
        };
    }
}

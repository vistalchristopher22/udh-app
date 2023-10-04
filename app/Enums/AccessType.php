<?php

namespace App\Enums;

enum AccessType: string
{
    case Public = 'public';
    case Private = 'private';
    // case Restricted = 'restricted';

    public static function keys(): array
    {
        return array_keys(self::all());
    }

    public static function all(): array
    {
        return array_map(fn ($value) => $value->value, self::cases());
    }
}

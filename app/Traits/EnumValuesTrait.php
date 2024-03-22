<?php

namespace App\Traits;

trait EnumValuesTrait
{
    public static function values(): array
    {
        return array_map(fn (self $enum): string => $enum->value, self::cases());
    }
}

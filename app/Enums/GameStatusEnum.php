<?php

namespace App\Enums;

use App\Traits\EnumValuesTrait;

enum GameStatusEnum: string
{
    use EnumValuesTrait;

    case PLAYED = 'played';
    case PLANNED = 'planned';
    case WALKOVER = 'walkover';
    case CANCELLED = 'cancelled';

    public static function valuesWithLabel(): array
    {
        return [
            self::PLAYED->value => 'Zagrany',
            self::PLANNED->value => 'Zaplanowany',
            self::WALKOVER->value => 'Walkower',
            self::CANCELLED->value => 'Anulowany'
        ];
    }
}

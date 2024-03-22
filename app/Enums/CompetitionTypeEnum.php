<?php

namespace App\Enums;

use App\Traits\EnumValuesTrait;

enum CompetitionTypeEnum: string
{
    use EnumValuesTrait;

    case LEAGUE = 'league';
    case CUP = 'cup';
    case LEAGUE_CUP = 'league_cup';

    public static function valuesWithLabel(): array
    {
        return [
            self::LEAGUE->value => 'Liga',
            self::CUP->value => 'Puchar',
            self::LEAGUE_CUP->value => 'Liga i puchar'
        ];
    }

    public function label(): string
    {
        return match ($this) {
            CompetitionTypeEnum::LEAGUE => 'Liga',
            CompetitionTypeEnum::CUP => 'Puchar',
            CompetitionTypeEnum::LEAGUE_CUP => 'Liga i puchar'
        };
    }
}

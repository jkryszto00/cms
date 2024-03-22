<?php

namespace App\Models;

use App\Enums\GameStatusEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Czego potrzebuje jeszcze model od meczu?
 * @todo[done] - Status = [played, planned, walkover, cancelled]
 * @todo[done] - game_date - datetime moze byc nullable wtedy jest jako planned
 * @todo[done] - round? - smallint nullable
 * @todo - half_result/full_result - small int
 */
class Game extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'status' => GameStatusEnum::class
    ];

    protected function finalResult(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                return '0:0';
            }
        );
    }

    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }

    public function competition(): BelongsTo
    {
        return $this->belongsTo(Competition::class);
    }

    public function home(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function away(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}

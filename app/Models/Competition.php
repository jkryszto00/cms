<?php

namespace App\Models;

use App\Enums\CompetitionTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Competition extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'type' => CompetitionTypeEnum::class,
        ];
    }

    public function seasons(): BelongsToMany
    {
        return $this->belongsToMany(Season::class);
    }

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class);
    }

    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }
}

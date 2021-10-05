<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Game extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $appends = [
        'winner',
    ];

    public function players(): BelongsToMany
    {
        return $this->belongsToMany(Player::class);
    }

    public function getWinnerAttribute(): Player
    {
        return $this->players()->wherePivot('winner', true)->withPivot(['winner', 'color', 'cue_number'])->first();
    }
}

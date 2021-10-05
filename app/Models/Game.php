<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Game extends Model
{
    use HasFactory;

    public const SOLID_COLOR = 'solid';

    public const STRIPE_COLOR = 'stripe';

    public const WINNING_NORMAL = 'win';

    public const WINNING_BLACK_BALL = 'black_ball';

    public const WINNING_BLACK_BALL_OPPONENT = 'black_ball_opponent';

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $appends = [
        'winner',
        'loser',
    ];

    public function players(): BelongsToMany
    {
        return $this->belongsToMany(Player::class)->withPivot(['winner', 'color', 'cue_number']);
    }

    public function getWinnerAttribute(): Player
    {
        return $this->players()->wherePivot('winner', true)->first();
    }

    public function getLoserAttribute(): Player
    {
        return $this->players()->wherePivot('winner', false)->first();
    }

    public static function getColors()
    {
        return [
            self::SOLID_COLOR,
            self::STRIPE_COLOR,
        ];
    }

    public static function getWinningMethods()
    {
        return [
            self::WINNING_NORMAL,
            self::WINNING_BLACK_BALL,
            self::WINNING_BLACK_BALL_OPPONENT,
        ];
    }
}

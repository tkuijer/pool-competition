<?php

namespace App\Services;

use App\Stats\winningBallStats;
use App\Stats\winningMethodsStats;
use App\Stats\winningPlayerPercentageStats;
use App\Stats\winningPlayerStats;

class StatsService
{
    public function getStats(): array
    {
        return [
            'winning_methods' => app(winningMethodsStats::class)->get(),
            'winning_players' => app(winningPlayerStats::class)->get(),
            'winning_balls' => app(winningBallStats::class)->get(),
            'winning_players_percentage' => app(winningPlayerPercentageStats::class)->get(),
        ];
    }
}

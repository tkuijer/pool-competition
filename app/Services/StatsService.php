<?php

namespace App\Services;

use App\Stats\winningBallStats;
use App\Stats\winningMethodsStats;
use App\Stats\winningPlayerPercentageStats;
use App\Stats\winningPlayerStats;

class StatsService
{
    public function getStats()
    {
        return [
            'winning_methods' => new winningMethodsStats(),
            'winning_players' => new winningPlayerStats(),
            'winning_balls' => new winningBallStats(),
            'winning_players_percentage' => new winningPlayerPercentageStats(),
        ];
    }
}

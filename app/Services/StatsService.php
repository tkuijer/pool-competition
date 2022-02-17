<?php

namespace App\Services;

use App\Stats\winningBallStats;
use App\Stats\winningCueStats;
use App\Stats\winningMethodsStats;
use App\Stats\winningPlayerPercentageStats;
use App\Stats\winningPlayerStats;

class StatsService
{
    public function getStats(): array
    {
        return [
            'winning_methods' => winningMethodsStats::get(),
            'winning_balls' => winningBallStats::get(),
            'winning_cues' => winningCueStats::get(),
            'winning_players_percentage' => winningPlayerPercentageStats::get(),
        ];
    }
}

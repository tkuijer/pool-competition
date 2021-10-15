<?php

namespace App\Stats;

use Illuminate\Support\Facades\DB;

class winningBallStats extends BaseStats implements StatsInterface
{
    public function get()
    {
        $data = DB::table('game_player')
            ->where('winner', 1)
            ->get()
            ->countBy('color')
            ->toArray();

        return [
            'datasets' => [
                [
                    'data' => array_values($data),
                    'backgroundColor' => ['#1ABC9C', '#FFC300'],
                ],
            ],
            'labels' => array_keys($data),
        ];
    }
}

<?php

namespace App\Stats;

use Illuminate\Support\Facades\DB;

class winningBallStats extends BaseStats implements StatsInterface
{
    public function data() : array
    {
        $data = DB::table('game_player')
            ->where('winner', 1)
            ->get()
            ->countBy('color')
            ->toArray();

        $dataSets = [
            [
                'data' => array_values($data),
                'backgroundColor' => ['#1ABC9C', '#FFC300'],
            ],
        ];

        return $this->getChartArray($dataSets, array_keys($data));
    }
}

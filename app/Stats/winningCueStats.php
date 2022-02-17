<?php

namespace App\Stats;

use Illuminate\Support\Facades\DB;

class winningCueStats extends BaseStats implements StatsInterface
{
    public function data(): array
    {
        $data = DB::table('game_player')
            ->where('winner', 1)
            ->whereNotNull('cue_number')
            ->get()
            ->countBy('cue_number')
            ->toArray();

        $dataSets = [
            [
                'data' => array_values($data),
                'backgroundColor' => ['#014040', '#03A678', '#F27405', '#731702'],
            ],
        ];

        return $this->getChartArray($dataSets, array_keys($data));
    }
}

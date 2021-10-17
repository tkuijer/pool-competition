<?php

namespace App\Stats;

use Illuminate\Support\Facades\DB;

class winningPlayerStats extends BaseStats implements StatsInterface
{
    public function get()
    {
        $winCounts = DB::table('game_player', 'gp')
            ->leftJoin('players AS p', 'p.id', 'gp.player_id')
            ->groupBy('p.id')
            ->where('gp.winner', true)
            ->selectRaw('count(1) as cnt, p.name')
            ->get();

        $data = [
            'datasets' => [
                [
                    'data' => [],
                ],
            ],
            'labels' => [],
        ];

        foreach ($winCounts as $count) {
            $data['datasets'][0]['data'][] = $count->cnt;
            $data['datasets'][0]['backgroundColor'][] = $this->getHexColorForString($count->name);
            $data['labels'][] = $count->name;
        }

        return $data;
    }
}

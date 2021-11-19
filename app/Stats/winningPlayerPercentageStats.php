<?php

namespace App\Stats;

use Illuminate\Support\Facades\DB;

class winningPlayerPercentageStats extends BaseStats implements StatsInterface
{
    public function data(): array
    {
        $matchCounts = DB::table('game_player', 'gp')
            ->leftJoin('players AS p', 'p.id', 'gp.player_id')
            ->get();

        //group by player, count all wins and losses, catch edge cases of people without wins or losses, calculate win percentage, sort descending
        $matchCounts = $matchCounts->groupBy('name')->map(function ($playerGames) {
            $winAndLossCount = $playerGames->sortBy('created_at')->take(-25)->countBy('winner')->toArray();

            if (! array_key_exists(1, $winAndLossCount)) {
                return 0;
            } elseif (! array_key_exists(0, $winAndLossCount)) {
                return 100;
            }

            return round(100 / ($winAndLossCount[0] + $winAndLossCount[1]) * $winAndLossCount[1]);
        })->sortDesc();

        foreach ($matchCounts as $key => $count) {
            $data['datasets'][0]['data'][] = $count;
            $data['datasets'][0]['backgroundColor'][] = $this->getHexColorForString($key);
            $data['labels'][] = $key;
        }

        $data['datasets'][0]['label'] = 'Gewonnen percentage van gespeelde potjes';

        return $data;
    }
}

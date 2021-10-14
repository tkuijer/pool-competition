<?php

namespace App\Services;

use App\Models\Game;
use Illuminate\Support\Facades\DB;

class StatsService
{
    public function getStats()
    {
        return [
            'winning_balls' => $this->getWinningBallStats(),
            'winning_players' => $this->getWinningPlayerStats(),
        ];
    }

    private function getWinningBallStats()
    {
        $games = Game::all();

        $winningBallStats = $games->reduce(function ($carry, Game $game) {
            $carry[$game->win_method] += 1;

            return $carry;
        }, [
            Game::WINNING_BLACK_BALL => 0,
            Game::WINNING_BLACK_BALL_OPPONENT => 0,
            Game::WINNING_NORMAL => 0,
        ]);

        return [
            'datasets' => [
                [
                    'data' => array_values($winningBallStats),
                    'backgroundColor' => ['#074650', '#E66C37', '#57B956'],
                ],
            ],
            'labels' => array_keys($winningBallStats),
        ];
    }

    private function getWinningPlayerStats()
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
            $data['datasets'][0]['backgroundColor'][] = '#'.substr(md5($count->name), 0, 6);
            $data['labels'][] = $count->name;
        }

        return $data;
    }
}

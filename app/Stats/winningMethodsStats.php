<?php

namespace App\Stats;

use App\Models\Game;

class winningMethodsStats extends BaseStats implements StatsInterface
{
    public function get()
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
}

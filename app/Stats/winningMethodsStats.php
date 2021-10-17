<?php

namespace App\Stats;

use App\Models\Game;
use Illuminate\Support\Collection;

class winningMethodsStats extends BaseStats implements StatsInterface
{
    private Collection $games;

    public function data(): array
    {
        $this->games = Game::all();

        $winningBallStats = $this->countWinningMetods();

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

    private function getWinningMethodStartCounters(): array
    {
        return [
            Game::WINNING_BLACK_BALL => 0,
            Game::WINNING_BLACK_BALL_OPPONENT => 0,
            Game::WINNING_NORMAL => 0,
        ];
    }

    private function countWinningMetods(): array
    {
        return $this->games->reduce(function ($winningMethods, Game $game) {
            $winningMethods[$game->win_method] += 1;

            return $winningMethods;
        }, $this->getWinningMethodStartCounters());
    }
}

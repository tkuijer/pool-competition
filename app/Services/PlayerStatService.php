<?php

namespace App\Services;

use App\Models\Game;
use App\Models\Player;

class PlayerStatService
{
    public const DAYNUMBER_FORMAT = 'N';

    private Player $player;

    private $wonGames;

    public function getForPlayer(Player $player)
    {
        $this->player = $player;
        $this->games = $player->games;

        $totalPlayedGames = $this->games->count();

        $this->wonGames = $this->games->filter(function (Game $game) {
            return $this->player->id === $game->winner->id;
        });

        $wonGamesCount = $this->wonGames->count();

        $lostGames = $this->games->filter(function (Game $game) {
            return $this->player->id !== $game->winner->id;
        });

        $lostGamesCount = $lostGames->count();

        $wonGamesByBlackBallOpponent = $this->wonGames->filter(function (Game $game) {
            return $game->win_method === Game::WINNING_BLACK_BALL_OPPONENT;
        })->count();

        $percentageWonGamesByBlackBallOpponent = $this->getPercentage($wonGamesByBlackBallOpponent, $wonGamesCount);

        $mostPlayedColor = $this->getMostPlayedColor();

        return [
            'playerName' => $this->player->name,
            'totalPlayedGames' => $totalPlayedGames,
            'totalWonGames' => $wonGamesCount,
            'totalLostGames' => $lostGames->count(),
            'percentageWonGames' => $this->getPercentage($wonGamesCount, $totalPlayedGames),
            'percentageLostGames' => $this->getPercentage($lostGamesCount, $totalPlayedGames),
            'wonGamesByBlackBallOpponent' => $wonGamesByBlackBallOpponent,
            'percentageWonGamesByBlackBallOpponent' => $percentageWonGamesByBlackBallOpponent,
            'mostPlayedColor' => $mostPlayedColor,
            'bestPlayingDay' => $this->getBestPlayingDay(),
            'mostDefeatedPlayer' => $this->getMostDefeatedPlayer(),
        ];
    }

    public function getPercentage($share, $whole)
    {
        return (int) round($share / ($whole / 100));
    }

    private function getMostPlayedColor(): array
    {
        return $this->games->groupBy(function (Game $game) {
            return $game->pivot->color;
        })->map(function ($games, $color) {
            return [
                'color' => $color,
                'amount' => $games->count(),
            ];
        })->values()
            ->sortByDesc('amount')
            ->first();
    }

    private function getBestPlayingDay()
    {
        if ($this->games->count() == 0) {
            return 'none';
        }

        return $this->wonGames
            ->map(function (Game $game) {
                return ['dayNumber' => $game->created_at->format(self::DAYNUMBER_FORMAT)];
            })
            ->countBy('dayNumber')
            ->map(function ($wins, $dayNumber) {
                return [
                    'wins' => $wins,
                    'dayNumber' => $dayNumber,
                    'dayName' => $this->getDayName($dayNumber),
                ];
            })
            ->sortByDesc('wins')
            ->first();
    }

    private function getDayName($dayNumber)
    {
        if (! is_int($dayNumber)) {
            return 'Geen';
        }

        $dayNames = [
            1 => 'Maandag',
            2 => 'Dinsdag',
            3 => 'Woensdag',
            4 => 'Donderdag',
            5 => 'Vrijdag',
            6 => 'Zaterdag',
            7 => 'Zondag',
        ];

        return $dayNames[$dayNumber];
    }

    private function getMostDefeatedPlayer(): ?array
    {
        if ($this->wonGames->count() === 0) {
            return null;
        }

        $mostDefeatedPlayer = $this->wonGames->map(function (Game $game) {
            return $game->loser;
        })->groupBy('id')
            ->map(function ($wonGames, $playerId) {
            return [
                'playerId' => $playerId,
                'wonGames' => $wonGames->count(),
            ];
        })
            ->sortByDesc('wonGames')
            ->first();

        $player = Player::find($mostDefeatedPlayer['playerId']);

        return [
            'player' => $player->name,
            'amount' => $mostDefeatedPlayer['wonGames'],
        ];
    }
}

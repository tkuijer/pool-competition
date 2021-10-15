<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Player;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class GameSeeder extends Seeder
{
    private Collection $players;

    private Collection $colors;

    private bool $winner = true;

    public function __construct()
    {
        $this->resetColors();
    }

    private function resetColors()
    {
        $this->colors = collect(Game::getColors());
    }

    public function run()
    {
        $this->players = Player::factory(8)->create();

        Game::factory(100)->create()
            ->each(function (Game $game) {
                $this->addPlayersToGame($game);
            });
    }

    public function addPlayersToGame(Game $game)
    {
        while ($this->notAllColorsAreSelected()) {
            $this->addPlayerToGame($game);
        }

        $this->resetColors();
    }

    private function notAllColorsAreSelected(): bool
    {
        return $this->colors->count() > 0;
    }

    private function addPlayerToGame(Game $game)
    {
        $game->players()->attach(
            $this->getRandomPlayerId(),
            [
                'color' => $this->getRandomColor(),
                'winner' => $this->getWinner(),
            ]
        );
    }

    private function getRandomPlayerId(): ?int
    {
        if (! $this->players) {
            return null;
        }

        return $this->players->random()->id;
    }

    private function getRandomColor(): string
    {
        $selectedColor = $this->colors->random();

        $this->takeColorFromAvailableColors($selectedColor);

        return $selectedColor;
    }

    private function takeColorFromAvailableColors(mixed $selectedColor)
    {
        $this->colors = $this->colors->reject(function ($availableColor) use ($selectedColor) {
            return $selectedColor === $availableColor;
        });
    }

    private function getWinner(): bool
    {
        $this->winner = ! $this->winner;

        return $this->winner;
    }
}

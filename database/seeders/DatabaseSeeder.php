<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Player;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class DatabaseSeeder extends Seeder
{
    public const MAXIMUM_PLAYERS = 2;

    private Collection $players;

    private Collection $colors;

    private bool $winner = true;

    public function __construct()
    {
        $this->resetColors();
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);

        $this->players = Player::factory()->count(10)->create();

        Game::factory(100)->create()
            ->each(function (Game $game) {
                $this->addPlayersToGame($game);
            });
    }

    public function addPlayersToGame(Game $game)
    {
        for ($i = 0; $i < self::MAXIMUM_PLAYERS; $i++) {
            $this->addPlayerToGame($game);
        }

        $this->resetColors();
    }

    private function getRandomPlayer()
    {
        if (! $this->players) {
            return null;
        }

        return $this->players->random()->id;
    }

    private function getRandomColor()
    {
        $selectedColor = $this->colors->random();

        $this->colors = $this->colors->reject(function ($availableColor) use ($selectedColor) {
            return $selectedColor === $availableColor;
        });

        return $selectedColor;
    }

    private function resetColors()
    {
        $this->colors = collect(Game::getColors());
    }

    private function getWinner()
    {
        $this->winner = ! $this->winner;

        return $this->winner;
    }

    private function addPlayerToGame(Game $game)
    {
        $game->players()->attach($this->getRandomPlayer(), [
            'color' => $this->getRandomColor(),
            'winner' => $this->getWinner(),
        ]);
    }
}

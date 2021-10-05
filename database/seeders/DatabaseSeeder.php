<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Player;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);

        // Create 10 random players
        $players = Player::factory()->count(10)->create();

        // Create 100 random games
        $games = Game::factory()->count(100)->create();

        // Attach players to games
        $games->each(function (Game $game) use ($players) {
            $colors = ['solid', 'stripe'];

            $game->players()->attach($players->random()->id, [
                'color' => $colors[0],
                'winner' => 1,
            ]);

            $game->players()->attach($players->random()->id, [
                'color' => $colors[1],
                'winner' => 0,
            ]);
        });
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Models\Game;
use App\Models\Player;
use Illuminate\Http\RedirectResponse;
use Inertia\Response as InertiaResponse;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return InertiaResponse
     */
    public function index(): InertiaResponse
    {
        $games = Game::with('players')->get();

        return inertia('Game/Index', [
            'games' => $games,
        ]);
    }

    public function create(): InertiaResponse
    {
        $players = Player::all();
        $colors = Game::getColors();
        $winningMethods = Game::getWinningMethods();

        return inertia(
            'Game/Create',
            compact('colors', 'players', 'winningMethods')
        );
    }

    public function store(StoreGameRequest $request): RedirectResponse
    {
        $colors = Game::getColors();
        $opponent_color = $colors[0] === $request->winner_color ? $colors[1] : $colors[0];

        $game = Game::create([
            'win_method' => $request->win_method,
        ]);

        $game->players()->attach([
            $request->winner_id => [
                'winner' => true,
                'color' => $request->winner_color,
            ],
            $request->opponent_id => [
                'winner' => false,
                'color' => $opponent_color,
            ],
        ]);

        return redirect()->route('game.index');
    }
}

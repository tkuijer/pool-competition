<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Player;
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

    public function create()
    {
        $players = Player::all();
        $colors = Game::getColors();
        $winningMethods = Game::getWinningMethods();

        return inertia(
            'Game/Create',
            compact('colors', 'players', 'winningMethods')
        );
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Game;
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
}

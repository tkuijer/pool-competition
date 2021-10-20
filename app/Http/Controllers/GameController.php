<?php

namespace App\Http\Controllers;

use App\Events\NewGameCreatedEvent;
use App\Http\Requests\StoreGameRequest;
use App\Models\Game;
use App\Models\Player;
use App\Services\StatsService;
use Illuminate\Http\RedirectResponse;
use Inertia\Response as InertiaResponse;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return InertiaResponse
     */
    public function index(StatsService $stats): InertiaResponse
    {
        return inertia('Game/Index', [
            'stats' => $stats->getStats(),
            'games' => Game::with('players')
                           ->orderByDesc('id')
                           ->paginate(10)
                           ->withQueryString(),
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

        NewGameCreatedEvent::dispatch($game->fresh('players'));

        return redirect()->route('game.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Inertia\Inertia;

class CompareController extends Controller
{
    public function show($player1, $player2)
    {
        $player1 = Player::getBySlug($player1);
        if (! $player1) {
            return response('Player 1 is niet gevonden', 400);
        }

        $player2 = Player::getBySlug($player2);
        if (! $player2) {
            return response('Player 2 is niet gevonden', 400);
        }

        return Inertia::render('Compare/Show', ['player1' => $player1->getStats(), 'player2' => $player2->getStats()]);
    }
}

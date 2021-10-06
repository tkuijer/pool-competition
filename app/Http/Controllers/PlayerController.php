<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Inertia\Response as InertiaResponse;

class PlayerController extends Controller
{
    public function index(): InertiaResponse
    {
        $players = Player::all();

        return inertia('Player/Index', [
            'players' => $players,
        ]);
    }
}

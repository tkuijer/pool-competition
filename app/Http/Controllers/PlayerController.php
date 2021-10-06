<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlayerRequest;
use App\Models\Player;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Response as InertiaResponse;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return InertiaResponse
     */
    public function index(): InertiaResponse
    {
        $players = Player::all();

        return inertia('Player/Index', [
            'players' => $players,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePlayerRequest $request
     *
     * @return RedirectResponse
     */
    public function store(StorePlayerRequest $request): RedirectResponse
    {
        Player::create($request->validated());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param Player $player
     *
     * @return Response
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Player $player
     *
     * @return Response
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Player  $player
     *
     * @return Response
     */
    public function update(Request $request, Player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Player $player
     *
     * @return Response
     */
    public function destroy(Player $player)
    {
        //
    }
}

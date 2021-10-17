<?php

namespace App\Observers;

use App\Models\Player;
use App\Services\PlayerSlugService;

class PlayerObserver
{
    private PlayerSlugService $slugService;

    public function __construct(PlayerSlugService $playerSlugService)
    {
        $this->slugService = $playerSlugService;
    }

    public function creating(Player $player)
    {
        $player->slug = $this->slugService->generate($player);
    }

    public function updating(Player $player)
    {
        if (! $player->isDirty('name')) {
            return;
        }

        $player->slug = $this->slugService->generate($player);
    }
}

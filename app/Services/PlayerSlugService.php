<?php

namespace App\Services;

use App\Models\Player;
use Illuminate\Support\Str;

class PlayerSlugService
{
    private string $slug;

    private int $identifier = 2;

    public function generate(Player $player): string
    {
        $this->setSlug($player->name);
        while (! $this->slugIsAvailable()) {
            $this->setSlug($player->name.' '.$this->identifier);
            $this->updateIdentifier();
        }

        return $this->slug;
    }

    private function slugIsAvailable(): bool
    {
        $player = Player::whereSlug($this->slug)->first();
        if ($player) {
            return false;
        }

        return true;
    }

    private function updateIdentifier()
    {
        $this->identifier++;
    }

    private function setSlug(string $string)
    {
        $this->slug = Str::slug($string);
    }
}

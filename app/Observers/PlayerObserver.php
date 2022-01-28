<?php

namespace App\Observers;

use App\Models\Player;

class PlayerObserver
{
    public function created(Player $player)
    {
        $player->generateCryptoKeys();
    }
}

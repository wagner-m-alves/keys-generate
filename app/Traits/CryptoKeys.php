<?php

namespace App\Traits;

use App\Services\KeyService;

trait CryptoKeys
{
    public function generateCryptoKeys()
    {
        $keys = app(KeyService::class)->generateKeyPair();

        $this->keys()->create([
            'player_id'     => $this->id,
            'pri_key'       => $keys['privateKey'],
            'pub_key'       => $keys['publicKey'],
        ]);
    }
}

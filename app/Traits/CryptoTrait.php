<?php

namespace App\Traits;

use App\Services\CryptographyService;
use Illuminate\Support\Facades\Crypt;

trait CryptoTrait
{
    public function encryptMyData($data)
    {
        $publicKey = $this->keys['pub_key'];

        return app(CryptographyService::class)->encrypt($data, $publicKey);
    }

    public function decryptMyData($data)
    {
        /**
         * Por motivo de segurança a chave privada do jogador é armazenada criptografada no
         * banco de dados, por isso, é necessário descriptografa-lá antes do uso.
         */
        $privateKey = Crypt::decrypt($this->keys['pri_key']);

        return app(CryptographyService::class)->decrypt($data, $privateKey);
    }
}

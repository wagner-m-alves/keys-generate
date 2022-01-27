<?php

namespace App\Services;

use Illuminate\Support\Facades\Crypt;

class CryptographyService
{
    private $keyService;

    public function __construct(KeyService $keyService)
    {
        $this->keyService = $keyService;
    }

    public function encrypt($data, $userId)
    {
        $publicKey = $this->keyService->getPublicKey($userId);

        openssl_public_encrypt($data, $encrypted, $publicKey);

        return $encrypted;
    }

    public function decrypt($data, $userId)
    {
        $privateKey = $this->keyService->getPrivateKey($userId);
        $privateKey = Crypt::decrypt($privateKey); // descriptografar chave privada

        openssl_private_decrypt($data, $decrypted, $privateKey);

        return $decrypted;
    }
}

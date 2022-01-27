<?php

namespace App\Services;

class CryptographyService
{
    public function encrypt($data, $userPublicKey)
    {
        openssl_public_encrypt($data, $encrypted, $userPublicKey);

        return $encrypted;
    }

    public function decrypt($data, $userPrivateKey)
    {
        openssl_private_decrypt($data, $decrypted, $userPrivateKey);

        return $decrypted;
    }
}

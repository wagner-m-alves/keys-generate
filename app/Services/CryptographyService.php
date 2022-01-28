<?php

namespace App\Services;

class CryptographyService
{
    public function encrypt($data, $publicKey)
    {
        openssl_public_encrypt($data, $encrypted, $publicKey);

        return $encrypted;
    }

    public function decrypt($data, $privateKey)
    {
        openssl_private_decrypt($data, $decrypted, $privateKey);

        return $decrypted;
    }
}

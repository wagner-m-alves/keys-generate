<?php

namespace App\Services;

class KeyService
{
    public function generateKeyPair()
    {
         $configs = array(
             "digest_alg"        => "sha512",
             "private_key_bits"  => 4096,
             "private_key_type"  => OPENSSL_KEYTYPE_RSA,
         );

        // Criar objeto de chave
        $key = openssl_pkey_new($configs);

        // Exportar chave privada
        openssl_pkey_export($key, $privateKey);

        // Exportar chave publica
        $publicKey = openssl_pkey_get_details($key);
        $publicKey = $publicKey["key"];

        return ['privateKey' => $privateKey, 'publicKey' => $publicKey];
    }
}

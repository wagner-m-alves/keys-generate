<?php

namespace App\Services;

use App\Models\Key;

class KeyService
{
    private $digestAlg;
    private $bits;
    private $type;

    public function __construct($digestAlg = "sha512", $bits = 4096, $type = OPENSSL_KEYTYPE_RSA)
    {
        $this->digestAlg    = $digestAlg;
        $this->bits         = $bits;
        $this->type         = $type;
    }

    public function generateKeyPair()
    {
         $configs = array(
             "digest_alg"        => $this->digestAlg,
             "private_key_bits"  => $this->bits,
             "private_key_type"  => $this->type,
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

    public function getPublicKey($userId)
    {
        return Key::where('user_id', $userId)->first()->pub_key;
    }

    public function getPrivateKey($userId)
    {
        return Key::where('user_id', $userId)->first()->pri_key;
    }
}

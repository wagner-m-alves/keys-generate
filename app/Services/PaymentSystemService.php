<?php

namespace App\Services;

class PaymentSystemService
{
    private $privateKey;
    private $publicKey;
    private $cryptographyService;

    public function __construct(KeyService $keyService, CryptographyService $cryptographyService)
    {
        if(!session('payment-system'))
            session(['payment-system' => $keyService->generateKeyPair()]);

        $this->privateKey           = session('payment-system')['privateKey'];
        $this->publicKey            = session('payment-system')['publicKey'];
        $this->cryptographyService  = $cryptographyService;
    }

    public function getPublicKey()
    {
        return $this->publicKey;
    }

    public function decryptData($data)
    {
        return $this->cryptographyService->decrypt($data, $this->privateKey);
    }
}

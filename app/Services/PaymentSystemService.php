<?php

namespace App\Services;

use App\Events\PaymentSystemResponseEvent;
use App\Models\Player;

class PaymentSystemService
{
    /**
     * O objetivo dessa classe é simular o funcionamento do Sistema
     * de Pagamento.
     */

    private $privateKey;
    private $publicKey;
    private $cryptographyService;

    public function __construct(KeyService $keyService, CryptographyService $cryptographyService)
    {
        if(!session('payment-system-keys'))
            session(['payment-system-keys' => $keyService->generateKeyPair()]);

        $this->privateKey           = session('payment-system-keys')['privateKey'];
        $this->publicKey            = session('payment-system-keys')['publicKey'];
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

    public function reply()
    {
        /**
         * Ao disparar o evento "PaymentSystemResponseEvent" notifica-se o ouvinte
         * "EncryptDataReturnedByPaymentSystemListener", o qual criptografa os dados a
         * serem retornados usando a chave publica do Player em questão.
         */

        $player_id  = 2;
        $player     = Player::find($player_id);
        $data       = 'Dados a serem retornados pelo Sistema de Pagamento.';

        if(!session('payment-system-data'))
            session(['payment-system-data' => $data]);

        event(new PaymentSystemResponseEvent($player)); // Disparar evento


        // ----- Apenas para teste -----
        $encrypted = session('payment-system-data');
        $decrypted = $player->decryptMyData($encrypted);

        dd($data, $encrypted, $decrypted);
        // -----------------------------
    }
}

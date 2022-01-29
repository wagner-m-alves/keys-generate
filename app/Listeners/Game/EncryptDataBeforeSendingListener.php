<?php

namespace App\Listeners\Game;

use App\Events\Game\BettingEvent;
use App\Services\CryptographyService;
use App\Services\PaymentSystemService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EncryptDataBeforeSendingListener
{
    private $paymentSystemService;
    private $cryptographyService;


    public function __construct(PaymentSystemService $paymentSystemService, CryptographyService $cryptographyService)
    {
        $this->paymentSystemService     = $paymentSystemService;
        $this->cryptographyService      = $cryptographyService;
    }

    public function handle(BettingEvent $event)
    {
        $data       = app()->instance(Illuminate\Http\Request::class, $event->request); // Instancia atual dos dados da requisição
        $publicKey  = $this->paymentSystemService->getPublicKey(); // chave publica do Sistema de Pagamento

        foreach ($data->all() as $key => $value)
        {
            $data->$key = $this->cryptographyService->encrypt($value, $publicKey);
        }
    }
}

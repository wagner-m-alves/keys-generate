<?php

namespace App\Listeners;

use App\Events\PaymentSystemResponseEvent;
use App\Services\CryptographyService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EncryptDataReturnedByPaymentSystemListener
{
    private $cryptographyService;

    public function __construct(CryptographyService $cryptographyService)
    {
        $this->cryptographyService = $cryptographyService;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PaymentSystemResponseEvent  $event
     * @return void
     */
    public function handle(PaymentSystemResponseEvent $event)
    {
        $data               = session('payment-system-data');
        $playerPublicKey    = $event->getPlayer()->getPublicKey();

        session(['payment-system-data' => $this->cryptographyService->encrypt($data, $playerPublicKey)]);
    }
}

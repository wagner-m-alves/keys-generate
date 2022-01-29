<?php

namespace App\Http\Controllers\Web\Game;

use App\Events\Game\BettingEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Game\BetRequest;
use App\Services\KeyService;
use App\Services\PaymentSystemService;

class BetController extends Controller
{
    /**
     * Ao disparar o evento "BettingEvent" notifica-se o ouvinte
     * "EncryptDataBeforeSendingListener", o qual criptografa os dados da
     * requisição em questão usando a chave publica do Sistema
     * de Pagamento.
     */
    public function store(BetRequest $request, PaymentSystemService $paymentSystemService)
    {
        event(new BettingEvent($request)); // Dispara o evento

        // Código ...
    }
}

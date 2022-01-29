<?php

namespace App\Http\Controllers\Web\Game;

use App\Events\Game\BettingEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Game\BetRequest;
use App\Services\PaymentSystemService;

class BetController extends Controller
{
    /**
     * Ao disparar o evento "BettingEvent" notifica-se o ouvinte
     * "EncryptDataBeforeSendingListener", o qual criptografa os dados da
     * requisição em questão usando a chave publica do Sistema
     * de Pagamento.
     */
    public function register(BetRequest $request)
    {
        // ----- Apenas para teste -----
        $rawData = $request->bet;
        // -----------------------------


        event(new BettingEvent($request)); // Disparar o evento


        // ----- Apenas para teste -----
        $encrypted = $request->bet;

        $paymentSystemService   = app(PaymentSystemService::class);
        $decrypted              = $paymentSystemService->decryptData($encrypted);

        dd($rawData, $encrypted, $decrypted);
        // -----------------------------


        // Enviar dados para o Sistema de Pagamento ...
    }
}

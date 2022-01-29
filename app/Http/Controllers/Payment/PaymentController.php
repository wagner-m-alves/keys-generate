<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Services\PaymentSystemService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $PaymentSystemService;

    public function __construct(PaymentSystemService $PaymentSystemService)
    {
        $this->PaymentSystemService = $PaymentSystemService;
    }

    public function reply()
    {
        /**
         * Teste configurado apenas para o usuário criado pelo seeder
         */

        $this->PaymentSystemService->reply();
    }
}

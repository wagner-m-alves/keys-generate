<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\CryptographyService;
use Illuminate\Http\Request;

class CryptographyController extends Controller
{
    private $cryptographyService;
    private $data;

    public function __construct(CryptographyService $cryptographyService)
    {
        $this->cryptographyService  = $cryptographyService;
        $this->data                 = 'Teste de criptografia';
    }

    public function encrypt($userId)
    {
        $encrypted = $this->cryptographyService->encrypt($this->data, $userId);

        return $encrypted;
    }

    public function decrypt($userId)
    {
        $data = $this->cryptographyService->encrypt($this->data, $userId); // Apenas para teste

        $decrypted = $this->cryptographyService->decrypt($data, $userId);

        return $decrypted;
    }
}

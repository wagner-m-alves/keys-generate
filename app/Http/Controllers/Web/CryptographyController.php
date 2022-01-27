<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Key;
use App\Services\CryptographyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CryptographyController extends Controller
{
    private $cryptographyService;
    private $data;

    public function __construct(CryptographyService $cryptographyService)
    {
        $this->cryptographyService = $cryptographyService;
        $this->data = 'Teste de criptografia';
    }

    public function encrypt($userId)
    {
        $key = Key::where('user_id', $userId)->get();
        $publicKey = $key[0]['pub_key'];

        $encrypted = $this->cryptographyService->encrypt($this->data, $publicKey);

        return $encrypted;
    }

    public function decrypt($userId)
    {
        $key            = Key::where('user_id', $userId)->get();
        $publicKey      = $key[0]['pub_key'];
        $data           = $this->cryptographyService->encrypt($this->data, $publicKey);

        $key            = Key::where('user_id', $userId)->get();
        $privateKey     = Crypt::decrypt($key[0]['pri_key']);

        $decrypted      = $this->cryptographyService->decrypt($data, $privateKey);

        return $decrypted;
    }
}

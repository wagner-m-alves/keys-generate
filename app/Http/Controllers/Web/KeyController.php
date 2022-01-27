<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\KeyResource;
use App\Models\Key;
use App\Services\KeyService;
use Illuminate\Http\Request;

class KeyController extends Controller
{
    private $keyService;

    public function __construct(KeyService $keyService)
    {
        $this->keyService = $keyService;
    }

    public function generateKeyPair($id)
    {
        # Gerar par de chaves
        $keys = $this->keyService->generateKeyPair();

        # Verificar
        if(!$keys)
            return redirect()->back()->with('failed', 'Erro ao gerar par de chaves.');

        # Salvar chaves
        Key::create([
            'user_id' => $id,
            'pri_key' => $keys['privateKey'],
            'pub_key' => $keys['publicKey'],
        ]);

        return $keys['publicKey'];
    }

    public function getPublicKey($id)
    {
        $key = Key::where('user_id', $id)->first();

        return new KeyResource($key);
    }
}

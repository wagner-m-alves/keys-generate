<?php

use App\Http\Controllers\Web\Panel\HomeController;
use App\Http\Controllers\Web\Site\SiteController;
use Illuminate\Support\Facades\Route;


# Public Routes
Route::get('/', [SiteController::class, 'welcome'])->name('site.welcome');


# Private Routes

// Panel
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    # Dashboard
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});


# Test Routes
Route::get('encrypt-test', function () {
    $player     = auth()->user()->player;
    $data       = 'Teste de Criptografia.';

    $encrypted = $player->encryptMyData($data);
    $decrypted = $player->decryptMyData($encrypted);

    dd(['data' => $data, 'encrypted' => $encrypted, 'decrypted' => $decrypted]);
});

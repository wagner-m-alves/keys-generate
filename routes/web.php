<?php

use App\Http\Controllers\Web\Game\BetController;
use App\Http\Controllers\Web\Panel\HomeController;
use App\Http\Controllers\Web\Site\SiteController;
use Illuminate\Support\Facades\Route;


# Public Routes
Route::get('/', [SiteController::class, 'welcome'])->name('site.welcome');
Route::get('/bet', [SiteController::class, 'bet'])->name('site.bet');


# Private Routes

// Panel
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});

// Game
Route::group(['middleware' => ['auth:sanctum', 'verified'], 'prefix' => 'game'], function () {
    Route::post('/bet', [BetController::class, 'store'])->name('game.bet.store');
});


# Test Routes
Route::get('encrypt-test', function () {
    $player     = auth()->user()->player;
    $data       = 'Teste de Criptografia.';

    $encrypted = $player->encryptMyData($data);
    $decrypted = $player->decryptMyData($encrypted);

    dd(['data' => $data, 'encrypted' => $encrypted, 'decrypted' => $decrypted]);
});

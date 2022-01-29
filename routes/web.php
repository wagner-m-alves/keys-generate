<?php

use App\Http\Controllers\Payment\PaymentController;
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
    Route::post('/bet/register', [BetController::class, 'register'])->name('game.bet.register');
});

// Payment
Route::group(['middleware' => ['auth:sanctum', 'verified'], 'prefix' => 'payment'], function () {
    Route::get('/reply', [PaymentController::class, 'reply'])->name('payment.reply');
});

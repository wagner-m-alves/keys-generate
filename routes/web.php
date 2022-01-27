<?php

use App\Http\Controllers\Web\CryptographyController;
use App\Http\Controllers\Web\KeyController;
use App\Models\Key;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

# Key
Route::get('/keys/user/{id}/generate', [KeyController::class, 'generateKeyPair']);
Route::get('/keys/user/{id}/public-key', [KeyController::class, 'getPublicKey']);

# Cryptography
Route::get('/cryptography/{userId}/encrypt', [CryptographyController::class, 'encrypt']);
Route::get('/cryptography/{userId}/decrypt', [CryptographyController::class, 'decrypt']);

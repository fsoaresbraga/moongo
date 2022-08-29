<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\{
    LoginController
};
use App\Http\Controllers\Api\{
    TaxiController
};

Route::get('/', function() {
    return response()->json(['success' => true]);
});

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/reset/password', [LoginController::class, 'resetPassword'])->name('reset.password');
Route::post('/verify/token/password', [LoginController::class, 'VerifyTokenResetPassword'])->name('verify.token.reset.password');
Route::post('/create/taxi', [TaxiController::class, 'store'])->name('store.taxi');
<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\TokenController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('register');

Route::post('/get-token', [TokenController::class, 'getToken'])
    ->middleware('guest')
    ->name('login');

Route::middleware(['auth:sanctum'])->get('/authentificated-user', function (Request $request) {
    return $request->user();
});

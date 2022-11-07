<?php

use App\Http\Controllers\UserCarController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Car Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your car management.
|
*/

Route::apiResource('users', UserController::class)->middleware(['auth:sanctum']);
Route::apiResource('users.cars', UserCarController::class)->middleware(['auth:sanctum']);

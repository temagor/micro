<?php

use App\Http\Controllers\CarController;

/*
|--------------------------------------------------------------------------
| API Car Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your car management.
|
*/

Route::get('/cars', [CarController::class, 'index']);
Route::get('/cars/{car}', [CarController::class, 'show']);

Route::apiResource('cars', CarController::class)->middleware(['auth:sanctum'])->except(['index', 'show']);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/open-lock', [OpenController::class, 'open']);

Route::post('/rfid', [OpenController::class, 'rfid']);

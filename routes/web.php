<?php

use App\Http\Controllers\LogController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PerangkatController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::middleware(Authenticate::class)->group(function(){
    Route::get('/', function () {
        return view('welcome');
    });

    Route::middleware(AdminMiddleware::class)->group(function(){
        Route::resource('user', UserController::class);
    });

    Route::resource('perangkat', PerangkatController::class);
    Route::resource('peminjaman', PeminjamanController::class);
    Route::resource('log', LogController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

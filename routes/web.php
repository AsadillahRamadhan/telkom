<?php

use App\Http\Controllers\LogController;
use App\Http\Controllers\LogOpenController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PerangkatController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::middleware(Authenticate::class)->group(function(){
    Route::get('/', function () {
        return redirect()->route('perangkat.index');   
    });
    // Route::resource('user', UserController::class);
    Route::resource('perangkat', PerangkatController::class);
    // Route::resource('peminjaman', PeminjamanController::class);
    Route::resource('log', LogController::class);
    Route::resource('log-akses', LogOpenController::class);
    Route::get('get-data-log', [LogController::class, 'getData']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

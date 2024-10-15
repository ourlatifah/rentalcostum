<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CostumsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\OnlyAdmin;
use App\Http\Middleware\OnlyClient;
use App\Http\Middleware\OnlyGuest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::middleware('auth')->group (function () {
    
    Route::get('/logout', [App\Http\Controllers\AuthController::class,'logout'])->name('logout');
    Route::get('/profile', [App\Http\Controllers\UserController::class,'profile'])->middleware( 'App\Http\Middleware\OnlyClient');
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class,'dashboard'])->middleware('App\Http\Middleware\OnlyAdmin');
    Route::get('/costums', [App\Http\Controllers\CostumsController::class,'costums']);
});

Route::get('/costums', [App\Http\Controllers\CostumsController::class,'costums'])->middleware('auth');

Route::middleware('App\Http\Middleware\OnlyGuest')->group (function () {
    
    Route::get('/login', [App\Http\Controllers\AuthController::class,'login'])->name('login');
    Route::post('/login', [App\Http\Controllers\AuthController::class,'authenticating']);
    Route::get('/register', [App\Http\Controllers\AuthController::class,'register'])->name('register');
    Route::post('/register', [App\Http\Controllers\AuthController::class,'registerProcess']);
});

    
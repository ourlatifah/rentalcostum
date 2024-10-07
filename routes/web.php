<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/login', [App\Http\Controllers\AuthController::class,'login'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class,'authenticating']);
Route::get('/register', [App\Http\Controllers\AuthController::class,'register'])->name('register');

Route::group([
    'middleware' => ['auth'],
    'prefix' => 'admin',
    'as' => 'admin.'
     ], function(){
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class,'index'])->middleware('auth');

    });    

Route::group([
    'middleware' => ['auth'],
    'prefix' => 'client',
    'as' => 'client.'
     ], function(){
Route::get('/profile', [App\Http\Controllers\UserController::class,'index'])->middleware('auth');

    });
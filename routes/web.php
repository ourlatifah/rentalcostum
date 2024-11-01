<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CostumsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
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
    Route::get('/categories', [App\Http\Controllers\CategoryController::class,'index'])->middleware('App\Http\Middleware\OnlyAdmin');
    Route::get('/costums', [App\Http\Controllers\CostumsController::class,'index']);
});

Route::middleware('auth')->group (function () {
    Route::get('/categories', [App\Http\Controllers\CategoryController::class,'index']);
    Route::get('/add-category', [App\Http\Controllers\CategoryController::class,'add'])->middleware('App\Http\Middleware\OnlyAdmin');
    Route::post('/categories', [App\Http\Controllers\CategoryController::class,'store'])->middleware('App\Http\Middleware\OnlyAdmin');
    Route::get('/edit-category/{slug}', [App\Http\Controllers\CategoryController::class,'edit'])->name('categories.edit')->middleware('App\Http\Middleware\OnlyAdmin');
    Route::put('/edit-category/{slug}', [App\Http\Controllers\CategoryController::class,'update'])->name('categories.update')->middleware('App\Http\Middleware\OnlyAdmin');
    Route::delete('/categories/{slug}', [App\Http\Controllers\CategoryController::class,'destroy'])->name('categories.destroy')->middleware('App\Http\Middleware\OnlyAdmin');
});

Route::middleware('auth')->group (function () {
    Route::get('/costums', [App\Http\Controllers\CostumsController::class,'index']);
    Route::get('/add-costum', [App\Http\Controllers\CostumsController::class,'add'])->middleware('App\Http\Middleware\OnlyAdmin');
    Route::post('/costums', [App\Http\Controllers\CostumsController::class,'store'])->name('costum.store')->middleware('App\Http\Middleware\OnlyAdmin');
    Route::get('/edit-costum/{slug}', [App\Http\Controllers\CostumsController::class,'edit'])->name('costums.edit')->middleware('App\Http\Middleware\OnlyAdmin');
    Route::put('/edit-costum/{slug}', [App\Http\Controllers\CostumsController::class,'update'])->name('costums.update')->middleware('App\Http\Middleware\OnlyAdmin');
    Route::delete('/costums/{slug}', [App\Http\Controllers\CostumsController::class,'destroy'])->name('costums.destroy')->middleware('App\Http\Middleware\OnlyAdmin');
});

Route::middleware('App\Http\Middleware\OnlyGuest')->group (function () {
    Route::get('/login', [App\Http\Controllers\AuthController::class,'login'])->name('login');
    Route::post('/login', [App\Http\Controllers\AuthController::class,'authenticating']);
    Route::get('/register', [App\Http\Controllers\AuthController::class,'register'])->name('register');
    Route::post('/register', [App\Http\Controllers\AuthController::class,'registerProcess']);
});

    
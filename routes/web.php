<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CostumsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\CostumRentController;
use App\Http\Controllers\PublicController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\OnlyAdmin;
use App\Http\Middleware\OnlyClient;
use App\Http\Middleware\OnlyGuest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\PublicController::class,'index'])->name('public.index');

//halaman admin
Route::middleware('auth', 'App\Http\Middleware\OnlyAdmin')->group (function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class,'dashboard']);
//costums
    Route::get('/costums', [App\Http\Controllers\CostumsController::class,'index']);
    Route::get('/add-costum', [App\Http\Controllers\CostumsController::class,'add']);
    Route::post('/costums', [App\Http\Controllers\CostumsController::class,'store'])->name('costum.store');
    Route::get('/edit-costum/{slug}', [App\Http\Controllers\CostumsController::class,'edit'])->name('costums.edit');
    Route::put('/edit-costum/{slug}', [App\Http\Controllers\CostumsController::class,'update'])->name('costums.update');
    Route::delete('/costums/{slug}', [App\Http\Controllers\CostumsController::class,'destroy'])->name('costums.destroy');
//categories
    Route::get('/categories', [App\Http\Controllers\CategoryController::class,'index']);
    Route::get('/add-category', [App\Http\Controllers\CategoryController::class,'add']);
    Route::post('/categories', [App\Http\Controllers\CategoryController::class,'store']);
    Route::get('/edit-category/{slug}', [App\Http\Controllers\CategoryController::class,'edit'])->name('categories.edit');
    Route::put('/edit-category/{slug}', [App\Http\Controllers\CategoryController::class,'update'])->name('categories.update');
    Route::delete('/categories/{slug}', [App\Http\Controllers\CategoryController::class,'destroy'])->name('categories.destroy');
//userslist
    Route::get('/users', [App\Http\Controllers\UserController::class,'index'])->name('users');
    Route::get('/registered-users', [App\Http\Controllers\UserController::class,'registeredUsers']);
    Route::get('/users/{slug}', [App\Http\Controllers\UserController::class,'show']);
    Route::get('/users-detail/{slug}', [App\Http\Controllers\UserController::class,'show'])->name('users.detail');
    Route::get('/users-approve/{slug}', [App\Http\Controllers\UserController::class,'approve'])->name('users.approve');
    Route::delete('/users/{slug}', [App\Http\Controllers\UserController::class,'delete'])->name('users.delete');
    Route::get('/users-destroy/{slug}', [App\Http\Controllers\UserController::class,'destroy'])->name('users.destroy');

//costumsrent
    Route::get('/costums-rent', [App\Http\Controllers\CostumRentController::class,'index']);
    Route::post('/costums-rent', [App\Http\Controllers\CostumRentController::class,'store']);

//costumreturn
    Route::get('/costums-return', [App\Http\Controllers\CostumRentController::class,'return']);
    Route::post('/costums-return', [App\Http\Controllers\CostumRentController::class,'returnCostums']);

//rentlog
    Route::get('/rent-log', [App\Http\Controllers\RentLogController::class,'index']);
    Route::delete('/rent-log/{id}', [App\Http\Controllers\RentLogController::class,'destroy'])->name('rent-log.destroy');
});

//halaman users
Route::middleware('auth')->group (function () {
    Route::get('/logout', [App\Http\Controllers\AuthController::class,'logout'])->name('logout');
    Route::get('/profile', [App\Http\Controllers\UserController::class,'profile'])->middleware( 'App\Http\Middleware\OnlyClient');
});

//halaman login
Route::middleware('App\Http\Middleware\OnlyGuest')->group (function () {
    Route::get('/login', [App\Http\Controllers\AuthController::class,'login'])->name('login');
    Route::post('/login', [App\Http\Controllers\AuthController::class,'authenticating']);
    Route::get('/register', [App\Http\Controllers\AuthController::class,'register'])->name('register');
    Route::post('/register', [App\Http\Controllers\AuthController::class,'registerProcess']);
});

    
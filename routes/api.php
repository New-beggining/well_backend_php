<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('auth')->name('auth.')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');
});

Route::prefix('user')->name('user.')->group(function () {
    Route::post('register', [UserController::class, 'register'])->name('register');
});

// Авторизованные роуты (требуют токен)
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('users', UserController::class)->except(['create','store','edit']);
});

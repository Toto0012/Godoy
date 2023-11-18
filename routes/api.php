<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SucursalController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middlewares\RoleMiddleware;

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
Route::group(['middleware' => ['jwt.auth',RoleMiddleware::class . ':Admin']], function () {
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::get('index', [AuthController::class, 'index'])->name('index');
});

Route::group(['middleware' => ['api', 'cors'], 'prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::post('me', [AuthController::class, 'me'])->name('me');
});


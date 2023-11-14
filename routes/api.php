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
//Ruta para crear usuarios, esta protegida
Route::group(['middleware' => ['jwt.auth', RoleMiddleware::class . ':Admin']], function () {
  Route::post('register',[AuthController::class,'register'])->name('register');
});

//Ruta para sucursales
Route::group([
  'middleware' => ['jwt.auth', RoleMiddleware::class . ':Admin'],
  'prefix' => 'sucursal'
], function ($route) {
  Route::get('index', [SucursalController::class, 'index'])->name('sucursal.index');
  
});

//Rutas para el usuario
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
  ], function ($route) {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::post('me', [AuthController::class, 'me'])->name('me');
  });

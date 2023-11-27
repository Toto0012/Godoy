<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventarioController;
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

Route::group(['middleware' => ['jwt.auth', RoleMiddleware::class . ':Admin']], function () {
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::get('index', [AuthController::class, 'index'])->name('index');
});

Route::group(['middleware' => ['api', 'cors'], 'prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::post('me', [AuthController::class, 'me'])->name('me');
});

//Rutas de consumo api rest

Route::group(['middleware' => ['cors', RoleMiddleware::class . ':Admin', 'jwt.auth']], function () {
    Route::prefix('inventario')->group(function () {
        Route::post('index', [InventarioController::class, 'index']);
        Route::get('show/{id}', [InventarioController::class, 'show']);
        Route::post('store', [InventarioController::class, 'store']);
        Route::post('update/{id}', [InventarioController::class, 'update']);
        Route::delete('delete/{id}', [InventarioController::class, 'destroy']);

        // Rutas de sucursales 
        Route::prefix('sucursal')->group(function () {
            Route::get('index', [SucursalController::class, 'index']);
            Route::get('show/{id}', [SucursalController::class, 'show']);
            Route::post('store', [SucursalController::class, 'store']);
            Route::post('update/{id}', [SucursalController::class, 'update']);
            Route::delete('delete/{id}', [SucursalController::class, 'destroy']);
        });


        //ruta de productos
        Route::prefix('producto')->group(function () {
            Route::get('index', [ProductoController::class, 'index']);
            Route::get('show/{id}', [ProductoController::class, 'show']);
            Route::post('store', [ProductoController::class, 'store']);
            Route::post('update/{id}', [ProductoController::class, 'update']);
            Route::delete('delete/{id}', [ProductoController::class, 'destroy']);
        });
    });
});

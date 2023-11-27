<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SucursalController;
use App\Models\Inventario;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middlewares\RoleMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// WEB ROUTES ADMIN PROTECTED
Route::group(['middleware' => ['cors', RoleMiddleware::class . ':Admin', 'jwt.auth']], function () {
    // Rutas de sucursales 
    Route::prefix('sucursal')->group(function () {
        Route::get('index', [SucursalController::class, 'index']);
        Route::get('show/{id}', [SucursalController::class, 'show']);
        Route::post('store', [SucursalController::class, 'store']);
        Route::post('update/{id}', [SucursalController::class, 'update']);
        Route::delete('delete/{id}', [SucursalController::class, 'destroy']);
    });

    //Rutas de Inventario
    Route::prefix('inventario')->group(function () {
        Route::post('index', [InventarioController::class, 'index']);
        Route::get('show/{id}', [InventarioController::class, 'show']);
        Route::post('store', [InventarioController::class, 'store']);
        Route::post('update/{id}', [InventarioController::class, 'update']);
        Route::delete('delete/{id}', [InventarioController::class, 'destroy']);
    });

    Route::prefix('producto')->group(function () {
        Route::get('index', [ProductoController::class, 'index']);
        Route::get('show/{id}', [ProductoController::class, 'show']);
        Route::post('store', [ProductoController::class, 'store']);
        Route::post('update/{id}', [ProductoController::class, 'update']);
        Route::delete('delete/{id}', [ProductoController::class, 'destroy']);
    });

    Route::get('/csrf-token', function () {
        return response()->json(['csrf_token' => csrf_token()]);
    });

    
});

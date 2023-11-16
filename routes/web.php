<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SucursalController;
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

//WEB ROUTES ADMIN PROTECTED
Route::group(['middleware' => ['jwt.auth', RoleMiddleware::class . ':Admin']], function () {
    //rutas sucursales 
    Route::prefix('sucursal')->group(function () {
        Route::get('index', [SucursalController::class, 'index']);
    });    
  });
  
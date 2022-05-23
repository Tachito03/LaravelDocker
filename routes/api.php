<?php

use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CatalogosController;
use App\Http\Controllers\GestionusuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [UsuariosController::class, 'StartLogin']);
Route::post('/logout', [UsuariosController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'users', 'middleware' => 'auth:sanctum'], function(){
    Route::get('/roles', [GestionusuarioController::class, 'getAllRols']);
    Route::get('/lista', [GestionusuarioController::class, 'getUsers']); //for datatable
    Route::get('/accesos', [UsuariosController::class, 'HistorialAccesos']);
    Route::get('/historial', [UsuariosController::class, 'HistorialModificaciones']);
    Route::post('/add', [GestionusuarioController::class, 'addUser']);
    Route::get('/edit/{id}', [GestionusuarioController::class, 'editUser']);
    Route::post('/update/{id}', [GestionusuarioController::class, 'updateUser']);
    Route::post('/delete/{id}', [GestionusuarioController::class, 'deleteUser']);
});

Route::group(['prefix' => 'catalogs', 'middleware' => 'auth:sanctum'], function(){
    Route::get('/roles', [CatalogosController::class, 'getRoles']);
    Route::post('/add/rol', [CatalogosController::class, 'saveRol']);
    Route::get('/edit/rol/{id}', [CatalogosController::class, 'getRol']);
    Route::post('/update/rol/{id}', [CatalogosController::class, 'updateRol']);
});

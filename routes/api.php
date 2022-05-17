<?php

use App\Http\Controllers\UsuariosController;
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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [UsuariosController::class, 'IniciaSesion']);
Route::post('/permisos', [UsuariosController::class, 'Getpermisos']);
Route::post('/logout', [UsuariosController::class, 'Salir'])->middleware('auth:sanctum');
Route::get('/usuarios', [UsuariosController::class, 'ObtieneUsuarios']);
Route::post('/usuario/{id}', [UsuariosController::class, 'DesactivaUsuario']);




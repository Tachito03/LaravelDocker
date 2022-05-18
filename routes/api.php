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

Route::post('/login', [UsuariosController::class, 'StartLogin']);
Route::post('/logout', [UsuariosController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'users', 'middleware' => 'auth:sanctum'], function(){
    Route::get('/roles', [UsuariosController::class, 'getAllRols']);
    Route::get('/lista', [UsuariosController::class, 'getUsers']); //for datatable
    Route::get('/accesos', [UsuariosController::class, 'getAccesos']);
    Route::post('/add', [UsuariosController::class, 'addUser']);
    Route::get('/edit/{id}', [UsuariosController::class, 'editUser']);
    Route::post('/update/{id}', [UsuariosController::class, 'updateUser']);
    Route::post('/delete/{id}', [UsuariosController::class, 'deleteUser']);
});

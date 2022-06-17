<?php

use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CatalogosController;
use App\Http\Controllers\GestionusuarioController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\SubscripcionController;
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
    Route::get('/blocked', [UsuariosController::class, 'usuariosBloqueados']);
    Route::get('/intentos', [UsuariosController::class, 'intentosSesion']);
    Route::post('/intentos/update/{id}', [UsuariosController::class, 'updateIntentoSesion']);
    Route::post('/activate/{id}', [UsuariosController::class, 'activateUsuario']);
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

Route::group(['prefix' => 'reportes', 'middleware' => 'auth:sanctum'], function(){
    Route::get('/solicitud/equipoalmacen', [ReportesController::class, 'reporteSolicitudMaterial']);
    Route::get('/solicitud/epp', [ReportesController::class, 'reporteSolicitudEpp']);
    Route::get('/solicitud/consumible', [ReportesController::class, 'reporteSolicitudConsumible']);
    Route::get('/solicitud/extravio', [ReportesController::class, 'reporteRoboDanio']);
});

Route::group(['prefix' => 'suscription', 'middleware' => 'auth:sanctum'], function(){
    Route::get('/plans', [SubscripcionController::class, 'index']);
    Route::get('/usuario', [SubscripcionController::class, 'obtieneUsuario']);
    Route::get('/obtienedetalle/{plan}', [SubscripcionController::class, 'mostrarPlan']);
    Route::get('/check/{prod_id}/{name_prod}', [SubscripcionController::class, 'checkSubscribed']);
    Route::post('/purchase', [SubscripcionController::class, 'procesoPago']);
    
});

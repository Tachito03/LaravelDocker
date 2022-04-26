<?php

use Illuminate\Support\Facades\Route;
//use Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::group(['middleware'=> 'web'], function(){
    
});*/

Route::get('/', 'App\Http\Controllers\UserController@getLogin')->name('login');
Route::get('/dashboard', 'App\Http\Controllers\UserController@dashboard')->name('dashboard');
Route::get('/register', 'App\Http\Controllers\UserController@getRegister')->name('register-get');
Route::get('/user/{id}/edit', 'App\Http\Controllers\UserController@getEditUser')->name('Edit');
Route::post('/register', 'App\Http\Controllers\UserController@postRegister')->name('register-post');
Route::post('/login', 'App\Http\Controllers\UserController@postLogin')->name('login-post');
Route::post('/user/{id}', 'App\Http\Controllers\UserController@PostEditUser')->name('edit-post');
Route::post('/user/{id}/delete', 'App\Http\Controllers\UserController@PostDeleteUser')->name('Delete');
Route::get('/logout', 'App\Http\Controllers\UserController@getlogout')->name('Logout-get');
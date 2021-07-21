<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'App\Http\Controllers\Web\UsuarioController@index')->name('form.cadastrar');
Route::post('/', 'App\Http\Controllers\Web\UsuarioController@store')->name('cadastrar.submit');
Route::get('/listar', 'App\Http\Controllers\Web\UsuarioController@list')->name('usuarios.list');
Route::get('/editar/{id}', 'App\Http\Controllers\Web\UsuarioController@edit')->name('usuario.edit'); 
Route::get('/delete/{id}', 'App\Http\Controllers\Web\UsuarioController@delete')->name('usuario.delete'); 
Route::post('/update', 'App\Http\Controllers\Web\UsuarioController@update')->name('usuario.update');
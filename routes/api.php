<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// A rota aguarda um array estruturado de acordo com o model onde fará a inserção dos dados. 
Route::post('/usuario/store', 'App\Http\Controllers\Api\UsuarioController@store')->name('usuario.store');

// A rota aguarda um atributo pesquisa na request, caso seja vazio, ele retornará todos os usuários do banco de dados.
Route::get('/usuario/list', 'App\Http\Controllers\Api\UsuarioController@list')->name('usuario.list');

// A rota aguarda um id de usuário válido para exclusão.
Route::delete('/usuario/delete', 'App\Http\Controllers\Api\UsuarioController@delete')->name('usuario.delete');


Route::post('/usuario/update', 'App\Http\Controllers\Api\UsuarioController@update')->name('usuario.update');

Route::get('/usuario/find/{id}', 'App\Http\Controllers\Api\UsuarioController@findById')->name('usuario.find');

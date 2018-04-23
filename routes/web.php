<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home')->middleware(['ver.permissao']);

Route::get('usuarios/lista', 'UsuariosController@index')->middleware(['ver.permissao']);
Route::get('usuarios/cadastro', 'UsuariosController@novo')->middleware(['ver.permissao']);
Route::post('usuarios/salvar', 'UsuariosController@salvar')->middleware(['ver.permissao']);
Route::delete('usuarios/{usuario}', 'UsuariosController@deletar')->middleware(['ver.permissao']);
Route::get('usuarios/cadastro/{usuario}/editar', 'UsuariosController@editar')->middleware(['ver.permissao']);
Route::patch('usuarios/{usuario}', 'UsuariosController@atualizando')->middleware(['ver.permissao']);

<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('usuario','UsuarioController');
Route::get('dptos/{id}','UsuarioController@getDepartamentos');
Route::get('mcpios/{id}','UsuarioController@getMunicipios');
Route::get('datos/{id}','UsuarioController@getDatos');

Route::get('datos/{id}','UsuarioController@getDatos');

Route::resource('departamento','DepartamentoController');
Route::get('paises', 'DepartamentoController@getPaises');

Route::resource('municipio','MunicipioController');
Route::get('departamentos', 'MunicipioController@getDepart');

Route::resource('pais','PaisController');

Route::resource('correo','CorreoController');


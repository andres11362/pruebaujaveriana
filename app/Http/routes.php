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
    return view('auth.login');
});

//rutas que involucran al usuario
Route::resource('usuario','UsuarioController');
Route::get('dptos/{id}','UsuarioController@getDepartamentos');
Route::get('mcpios/{id}','UsuarioController@getMunicipios');
Route::get('datos/{id}','UsuarioController@getDatos');
Route::get('datos/{id}','UsuarioController@getDatos');

//ruta de inicio
Route::get('inicio', 'InicioController@index');

//rutas que involucran a los departamentos
Route::resource('departamento','DepartamentoController');
Route::get('paises', 'DepartamentoController@getPaises');

//rutas que involucran a los municipios
Route::resource('municipio','MunicipioController');
Route::get('departamentos', 'MunicipioController@getDepart');

Route::resource('pais','PaisController'); //ruta RESTful de pais

Route::resource('correo','CorreoController'); //ruta RESTful de correo

//ruta para indicar el envio de correos
Route::post('enviar',[
    'uses' =>'CorreoController@getEmails',
     'as' => 'correos.send'
    ]
);
// Rutas de autenticacion...
Route::get('auth/login',[
            'uses' => 'Auth\AuthController@getLogin',
            'as'   => 'auth.login'
] );
Route::post('auth/login',[
    'uses' => 'Auth\AuthController@postLogin',
    'as'   => 'auth.login'
] );

Route::get('auth/logout',[
    'uses' => 'Auth\AuthController@getLogout',
    'as'   => 'auth.logout'
] );



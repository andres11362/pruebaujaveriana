<?php

namespace pruebaujaveriana\Http\Controllers;

use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

use pruebaujaveriana\pais;
use pruebaujaveriana\departamento;
use pruebaujaveriana\municipio;
use pruebaujaveriana\User;

use Illuminate\Support\Facades\Redirect;

use pruebaujaveriana\Http\Requests\UsuarioCreateRequest;
use pruebaujaveriana\Http\Requests\UsuarioUpdateRequest;

use Illuminate\Routing\Route;
use pruebaujaveriana\Http\Requests;
use pruebaujaveriana\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin'); //indicamos por medio de un constructor que las acciones del controlador solo seran accedidas por un administrador
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuarios = User::dataLocal(); //usamos una funcion que implementa un query builder esta nos mostrara el pais, departamento y municipio con los que se relaciona cada usuario

        if($request->ajax()){ //indicamos si la peticion es de tipo ajax ejecute la accion
            return response()->json(view('usuarios.users', compact('usuarios'))->render());//retornamos un json con la vista que se usara,  enviamos los datos de usuarios que se usaran en la peticion ajax
        }

        return view('usuarios.index', compact('usuarios')); //retornamos la vista, enviando los usuarios
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pais = pais::lists('nombre', 'id'); //generamos una lista de paises la cual sea usada en un select para su uso
        return view('usuarios.create', compact('pais','dpto','mcpio')); //retornamos la vista de creacion de usuarios, enviado la lista de paises
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioCreateRequest $request) //usamos el request personalizado para su uso en el formulario
    {
        User::create([ //creamos una nueva instancia de usuario
                'id' => $request['id'],
                'nombres' => $request['nombres'],
                'apellidos' => $request['apellidos'],  //se ingresan los datos uno por uno esto es porque el formulario posee mas elementos que no se involucran con el modelo
                'telefono' => $request['telefono'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']), //indicamos que uso el algoritmo bcrypt para encriptar la contraseña
                'municipio_id' => $request{'municipio_id'}
            ]
        );

        return response()->json([
            'mensaje' => 'Usuario Agregado' //se retorna un json indicando que se ha realizado la transaccion se ha realizado
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pais = pais::lists('nombre', 'id');  //generamos una lista de paises la cual sea usada en un select para su uso
        $user = User::find($id);              //usamos la funcion find para encontrar un usuario en especifico usando el id
        return view('usuarios.edit', ['user' => $user, 'pais' => $pais]); //retornamos la vista de edicion de usuarios, enviando los datos de usuario y la lista de paises
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioUpdateRequest $request, $id) //usamos el request personalizado para su uso en el formulario
    {
        $user = User::find($id);  //usamos la funcion find para encontrar un usuario en especifico usando el id

        $user->fill($request->all()); //se llena la instancia del registro en especifico, indicandole que todos los se envia en el request
        $user->save(); //se guardan los cambios

        return response()->json([
            'mensaje' => 'Usuario Actualizado' //enviamos un json indicando que la transaccion se ha realizado
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id); //usamos la funcion destroy para encontrar un usuario y eliminarl en especifico usando el id
        return response()->json(['mensaje' => 'borrado']); //enviamos un json indicando que la transaccion se ha realizado
    }

    public function getDepartamentos(Request $request,$id){ //funcion para obtener departamentos segun el pais
            if($request->ajax()){  //indicamos que si la peticion es de tipo ajax realice la transaccion
                $dptos = departamento::dptos($id); //buscamos por medio del query builder los departamentos relacionados al pais
                return response()->json($dptos); //retornamos la respuesta en un json
            }
    }

    public function getMunicipios(Request $request,$id){ //funcion para obtener municipios segun el departamento
        if($request->ajax()){       //indicamos que si la peticion es de tipo ajax realice la transaccion
            $mcpios = municipio::mcpios($id);  //buscamos por medio del query builder los municipios relacionados al departamento
            return response()->json($mcpios); //retornamos la respuesta en un json
        }
    }

    public function getDatos(Request $request, $id){
        if($request->ajax()){ //indicamos que si la peticion es de tipo ajax realice la transaccion
            $datos = User::dataUser($id); //buscamos por medio del query builder los datos del usuario, incluido municipio, departamento y pais
            return response()->json($datos);//retornamos la respuesta en un json
        }
    }

}

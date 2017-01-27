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
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuarios = User::dataLocal();

        if($request->ajax()){
            return response()->json(view('usuarios.users', compact('usuarios'))->render());
        }

        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pais = pais::lists('nombre', 'id');
        return view('usuarios.create', compact('pais','dpto','mcpio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioCreateRequest $request)
    {
        User::create([
                'id' => $request['id'],
                'nombres' => $request['nombres'],
                'apellidos' => $request['apellidos'],
                'telefono' => $request['telefono'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
                'municipio_id' => $request{'municipio_id'}
            ]
        );

        return response()->json([
            'mensaje' => 'Usuario Agregado'
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
        $pais = pais::lists('nombre', 'id');
        $user = User::find($id);
        return view('usuarios.edit', ['user' => $user, 'pais' => $pais]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioUpdateRequest $request, $id)
    {
        $user = User::find($id);

        $user->fill($request->all());
        $user->save();

        return response()->json([
            'mensaje' => 'Usuario Actualizado'
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
        User::destroy($id);
        return response()->json(['mensaje' => 'borrado']);
    }

    public function getDepartamentos(Request $request,$id){
            if($request->ajax()){
                $dptos = departamento::dptos($id);
                return response()->json($dptos);
            }
    }

    public function getMunicipios(Request $request,$id){
        if($request->ajax()){
            $mcpios = municipio::mcpios($id);
            return response()->json($mcpios);
        }
    }

    public function getDatos(Request $request, $id){
        if($request->ajax()){
            $datos = User::dataUser($id);
            return response()->json($datos);
        }
    }

}

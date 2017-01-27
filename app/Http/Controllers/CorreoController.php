<?php

namespace pruebaujaveriana\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use pruebaujaveriana\correo;
use pruebaujaveriana\Http\Requests\CorreoRequest;
use pruebaujaveriana\Http\Requests;
use pruebaujaveriana\Http\Controllers\Controller;

class CorreoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Auth::user()->id;

        $correos = correo::mails($usuario);

        return view('correos.index', ['correos' => $correos]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('correos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CorreoRequest $request)
    {
        if($request->ajax()){
            correo::create($request->all());
        }
        return response()->json(["mensaje" => 'Correo creado']);
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
        $correo = correo::find($id);
        return  response()->json($correo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CorreoRequest $request, $id)
    {
        $correo = correo::find($id);
        $correo->fill($request->all());
        $correo->save();
        return response()->json(['mensaje' => 'listo']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $correo = correo::find($id);
        $correo->delete();
        return response()->json(['mensaje' => 'borrado']);
    }
}

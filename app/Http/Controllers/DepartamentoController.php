<?php

namespace pruebaujaveriana\Http\Controllers;

use Illuminate\Http\Request;
use pruebaujaveriana\pais;
use pruebaujaveriana\departamento;
use pruebaujaveriana\Http\Requests;
use pruebaujaveriana\Http\Controllers\Controller;

use pruebaujaveriana\Http\Requests\DepartamentoRequest;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $dptos = departamento::paises();
            return response()->json($dptos);
        }

        return view('departamentos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = pais::lists('nombre','id');
        return view('departamentos.create', compact('paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartamentoRequest $request)
    {
        departamento::create($request->all());
        return response()->json(["mensaje" => 'Departamento Creado']);
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
       $dpto = departamento::find($id);
       return response()->json($dpto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartamentoRequest $request, $id)
    {
        $dpto = departamento::find($id);
        $dpto->fill($request->all());
        $dpto->save();
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
        $dpto = departamento::find($id);
        $dpto->delete();
        return response()->json(['mensaje' => 'borrado']);
    }

    public function getPaises(){
        $paises = departamento::countries();
        return response()->json($paises);
    }

}

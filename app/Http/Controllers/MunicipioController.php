<?php

namespace pruebaujaveriana\Http\Controllers;

use Illuminate\Http\Request;
use pruebaujaveriana\departamento;
use pruebaujaveriana\Http\Requests\MunicipioRequest;

use pruebaujaveriana\Http\Requests;
use pruebaujaveriana\Http\Controllers\Controller;
use pruebaujaveriana\municipio;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $mcpios = municipio::municipios();
            return response()->json($mcpios);
        }

        return view('municipios.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dpto = departamento::lists('nombre','id');
        return view('municipios.create', compact('dpto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MunicipioRequest $request)
    {
        municipio::create($request->all());
        return response()->json(["mensaje" => 'Municipio Creado']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mcpio = municipio::find($id);
        return  response()->json($mcpio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MunicipioRequest $request, $id)
    {
        $mcpio = municipio::find($id);
        $mcpio->fill($request->all());
        $mcpio->save();
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
        $mcpio = municipio::find($id);
        $mcpio->delete();
        return response()->json(['mensaje' => 'borrado']);
    }

    public function getDepart(){
        $mcpio = municipio::depart();
        return response()->json($mcpio);
    }

}

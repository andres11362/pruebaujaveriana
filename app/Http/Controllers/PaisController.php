<?php

namespace pruebaujaveriana\Http\Controllers;

use Illuminate\Http\Request;
//use pruebaujaveriana\pais;
use pruebaujaveriana\Http\Requests\PaisCreateRequest;
use Illuminate\Routing\Route;
use pruebaujaveriana\Http\Requests;
use pruebaujaveriana\Http\Controllers\Controller;
use pruebaujaveriana\pais;

class PaisController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $paises = pais::all();
            return response()->json($paises);
        }

        return view('paises.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paises.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaisCreateRequest $request)
    {
        if($request->ajax()){
            pais::create($request->all());
            return response()->json([
                'mensaje' => 'País Agregado'
            ]);
        }
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
        $pais = pais::find($id);

        return response()->json($pais);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pais = pais::find($id);
        $pais->fill($request->all());
        $pais->save();
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
        $pais = pais::find($id);
        $pais->delete();
        return response()->json(['mensaje' => 'borrado']);
    }
}

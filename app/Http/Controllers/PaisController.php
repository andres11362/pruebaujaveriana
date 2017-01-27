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
        if($request->ajax()){ //indicamos que si la peticion es de tipo ajax ejecute la accion
            $paises = pais::all(); //indicamos que nos muestre todos los paises que existen en el modelo
            return response()->json($paises); //enviamos una respuesta tipo json la cual sera usada por la peticion ajax
        }

        return view('paises.index'); //retornamos la vista principal de departamentos
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paises.create'); //retornamos la vista de creacion de paises
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaisCreateRequest $request) //usamos el request personalizado para su uso en el formulario
    {
        if($request->ajax()){ //indicamos que si el request es de tipo ajax ejecute la accion
            pais::create($request->all()); //creamos una nueva instancia de pais enviandole todos los datos del formulario
            return response()->json([
                'mensaje' => 'País Agregado' //retornamos un json confirmando la transaccion
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
        $pais = pais::find($id); //buscamos un departamento en especifico usando la funcion find, se envia el id del pais que se desea encontrar
        return response()->json($pais); //retornamos un json con los datos de la consulta que sera usadas por un peticion ajax posteriormente
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
        $pais = pais::find($id);  //buscamos un departamento en especifico usando la funcion find, se envia el id del pais que se desea encontrar
        $pais->fill($request->all()); //se llena la instancia del registro en especifico, indicandole que todos los se envia en el request
        $pais->save(); //se guardan los cambios
        return response()->json(['mensaje' => 'listo']); //enviamos un json indicando que la transaccion se ha realizado
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pais = pais::find($id); //buscamos un departamento en especifico usando la funcion find, se envia el id del pais que se desea encontrar
        $pais->delete(); //se le indica a la instancia que va ser eliminada
        return response()->json(['mensaje' => 'borrado']); //enviamos un json indicando que la transaccion se ha realizado
    }
}

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
            $mcpios = municipio::municipios(); //utilizamos una funcion que utiliza el query builder que nos mostrara los paises  y departamentos relacionados con los departamentos registrados
            return response()->json($mcpios);//enviamos una respuesta tipo json la cual sera usada por la peticion ajax
        }

        return view('municipios.index');    //retornamos la vista principal de municipios
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dpto = departamento::lists('nombre', 'id'); //generamos una lista de departamentos la cual sea usada en un select para su uso
        return view('municipios.create', compact('dpto'));  //retornamos la vista de creacion de departamentos, enviado la lista de departamentos
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MunicipioRequest $request) //usamos el request personalizado para validar el formulario relacionado con el municipio
    {
        municipio::create($request->all());  //indicamos a municipio que genere una nueva instancia y guarde todos los datos que se envian en la peticion
        return response()->json(["mensaje" => 'Municipio Creado']); //retornamos un json indicando que la transaccion se ha realizado
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
        $mcpio = municipio::find($id); //buscamos un municipio en especifico usando la funcion find, se envia el id del municipio que se desea encontrar
        return  response()->json($mcpio); //retornamos un json con los datos de la consulta que sera usadas por un peticion ajax posteriormente
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MunicipioRequest $request, $id) //usamos el request personalizado para validar el formulario relacionado con el municipio
    {
        $mcpio = municipio::find($id); //buscamos un municipio en especifico usando la funcion find, se envia el id del municipio que se desea encontrar
        $mcpio->fill($request->all()); //se llena la instancia del registro en especifico, indicandole que todos los se envia en el request
        $mcpio->save();  //se guardan los cambios
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
        $mcpio = municipio::find($id); //buscamos un municipio en especifico usando la funcion find, se envia el id del municipio que se desea encontrar
        $mcpio->delete();  //se le indica a la instancia que va ser eliminada
        return response()->json(['mensaje' => 'borrado']); //enviamos un json indicando que la transaccion se ha realizado
    }

    public function getDepart(){
        $mcpio = municipio::depart(); //usamos una funcion que usa un query builder esta traera todos los departamentos y se llenara un select con ella
        return response()->json($mcpio); //se retorna un json con el resultado de la consulta
    }

}

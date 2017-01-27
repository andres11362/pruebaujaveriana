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
            $dptos = departamento::paises(); //utilizamos una funcion que utiliza el query builder que nos mostrara los paises relacionados con los departamentos registrados
            return response()->json($dptos); //enviamos una respuesta tipo json la cual sera usada por la peticion ajax
        }

        return view('departamentos.index'); //retornamos la vista principal de departamentos
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = pais::lists('nombre','id'); //generamos una lista de paises la cual sea usada en un select para su uso
        return view('departamentos.create', compact('paises')); //retornamos la vista de creacion de departamentos, enviado la lista de paises
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartamentoRequest $request) //usamos el request personalizado para validar el formulario relacionado con el departamento
    {
        departamento::create($request->all()); //indicamos a departamento que genere una nueva instancia y guarde todos los datos que se envian en la peticion
        return response()->json(["mensaje" => 'Departamento Creado']); //retornamos un json indicando que la transaccion se ha realizado
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
       $dpto = departamento::find($id); //buscamos un departamento en especifico usando la funcion find, se envia el id del departamento que se desea encontrar
       return response()->json($dpto); //retornamos un json con los datos de la consulta que sera usadas por un peticion ajax posteriormente
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartamentoRequest $request, $id) //usamos el request personalizado para validar el formulario relacionado con el departamento
    {
        $dpto = departamento::find($id); //buscamos un departamento en especifico usando la funcion find, se envia el id del departamento que se desea encontrar
        $dpto->fill($request->all()); //se llena la instancia del registro en especifico, indicandole que todos los se envia en el request
        $dpto->save(); //se guardan los cambios
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
        $dpto = departamento::find($id);//buscamos un departamento en especifico usando la funcion find, se envia el id del departamento que se desea encontrar
        $dpto->delete(); //se le indica a la instancia que va ser eliminada
        return response()->json(['mensaje' => 'borrado']); //enviamos un json indicando que la transaccion se ha realizado
    }

    public function getPaises(){
        $paises = departamento::countries(); //usamos una funcion que usa un query builder esta traera todos los paises y se llenara un select con ella
        return response()->json($paises); //se retorna un json con el resultado de la consulta
    }

}

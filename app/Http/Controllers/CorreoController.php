<?php

namespace pruebaujaveriana\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use pruebaujaveriana\correo;
use pruebaujaveriana\Http\Requests\CorreoRequest;
use pruebaujaveriana\Http\Requests;
use pruebaujaveriana\Http\Controllers\Controller;

class CorreoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); //indicamos por medio de un constructor que las acciones del controlador solo seran accedidas solo si hay autorizacion del sistema
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Auth::user()->id; //declaramos una variable $usuario que sera igual al id del usuario que esta actualmente autorizado en el sistema

        $correos = correo::mails($usuario); //usamos un funcion basada en un querybuilder que dara como resultados los correos inscritos por el usuario

        return view('correos.index', ['correos' => $correos]); //retornamos la vista index de correos y enviaremos los correos que tiene el usuario actualmente

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('correos.create'); //retornamos la vista de creacion de correos
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CorreoRequest $request) //usamos un request personalizado para validar campos en el formulario
    {
        if($request->ajax()){ //indicamos que si el request es de tipo ajax ejecute la accion
            correo::create($request->all());//inserta los datos a la tabla correo con todos los campos que request ha enviado
        }
        return response()->json(["mensaje" => 'Correo creado']); //enviamos un json indicando que el correo se ha creado
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
        $correo = correo::find($id); //se hace una busqueda en el modelo correo enviando como parametro el $id de ese correo
        return  response()->json($correo); //retornamos un json con el correo que corresponda al id para se usado en una peticion ajax
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
        $correo = correo::find($id); //buscamos un correo en especifico dependiendo del id del usuario
        $correo->fill($request->all()); //se llena la instancia del registro en especifico, indicandole que todos los se envia en el request
        $correo->save(); //se guardan los cambios
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
        $correo = correo::find($id); //buscamos un correo en especifico dependiendo del id del usuario
        $correo->delete(); //se le indica a la instancia que va ser eliminada
        return response()->json(['mensaje' => 'borrado']); //enviamos un json indicando que la transaccion se ha realizado
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getEmails() //funcion con la cual se enviaran los correos
    {


        $usuario = Auth::User()->id;       //se utiliza el componente de autorizacion en este caso el id del usuario logeado
        $correos = correo::mails($usuario); //se utiliza una funcion hecha con el querybuilder en la cual buscamos todos los correos registrador por el usuario
        

        foreach ($correos as $correo){//se hace un recorrido por cada uno de los correos del usuario por medio de un foreach

            $asunto = $correo->asunto;
            $destinatario = $correo->destinatario;
            $mensaje = $correo->mensaje;

            Mail::later(5,'correos.mails.envio',['asunto' => $asunto, 'destinatario' => $destinatario, 'mensaje' => $mensaje ],function ($msj) use($correo){ //se usa el componente Mail para poder usar el envio de correos indicando: la plantilla que se envia y los datos que se van a usar,
                $msj->subject($correo->asunto); //indicamos que  subject sera el asunto de cada correo que registra el usuario
                $msj->to($correo->destinatario); //indicamos que to sera el destinatario de cada correo que registra el usuario
            });

            if (Mail::failures()) { //se revisa si el correo ha fallado entonces actualice el estado del correo a false en caso contrario a true
                $correo->estado == false;
            }else{
                $correo->estado == true;
            }

            $correo->save(); //guardamos los cambios
        }

        return redirect('correo');
    }

}

<?php

namespace pruebaujaveriana\Http\Middleware;

use Closure;

use Illuminate\Auth\Guard;
use Session;
class Admin
{

    //se crea un middleware que filtrara las peticiones en este caso para un administrador de la aplicacion

    protected $auth; //se crea una variable llamada auth

    public function __construct(Guard $auth)
    {
        $this->auth = $auth; //se crea un constructor que genera un nuevo onjeto de tipo guard
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this->auth->user()->id != 1136883231){ //se indica que si un usuario no posee este id no tendra permiso para acceder a algunas rutas de la aplicacion
            Session::flash('message-error', 'El usuario no tiene privilegios'); //se envia un mensaje en la session indicando que el usuario no tiene privilegios
            return redirect()->to('/inicio'); //se redirige al inicio de la pagina
        }

        return $next($request);
    }
}

<?php

namespace pruebaujaveriana\Http\Middleware;

use Closure;

use Illuminate\Auth\Guard;
use Session;
class Admin
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
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
        if($this->auth->user()->id != 1136883231){
            Session::flash('message-error', 'El usuario no tiene privilegios');
            return redirect()->to('/inicio');
        }

        return $next($request);
    }
}

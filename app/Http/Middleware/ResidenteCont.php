<?php

namespace SAC\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;

class ResidenteCont
{
    protected $auth;

    public function __construct(Guard $auth){
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
        if(($this->auth->user()->rol_Usuario != 'administrador') && 
            ($this->auth->user()->rol_Usuario != 'contador') && 
            ($this->auth->user()->rol_Usuario != 'residente')){
            Session::flash('message-error','No tiene los Permisos para acceder a esta seccion');

            if ($this->auth->user()->rol_Usuario == 'supervisor') {
                return redirect()->to('Supervisor');
            }
        }
        return $next($request);
    }
}

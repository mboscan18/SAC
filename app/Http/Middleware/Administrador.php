<?php

namespace SAC\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;

class Administrador
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
        if($this->auth->user()->rol_Usuario != 'administrador'){
            Session::flash('message-error','No tiene los Permisos para acceder a esta seccion');

            if ($this->auth->user()->rol_Usuario == 'supervisor') {
                return redirect()->to('Supervisor');
            }elseif ($this->auth->user()->rol_Usuario == 'residente') {
                return redirect()->to('Residente');
            }elseif ($this->auth->user()->rol_Usuario == 'contador') {
                return redirect()->to('Contador');
            }
        }
        return $next($request);
    }
}

<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\Proyectos;
use SAC\Pagos;
use Session;
use Redirect;
use DB;

use SAC\Http\Requests;
use SAC\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class PagosController extends Controller
{
     public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('auth');
        $this->middleware('contador',['only' => ['create','store','edit','update','destroy']]);
        $this->middleware('contador_sup',['only' => ['index']]);
        $this->middleware('administrador',['only' => ['showDeletes','restore']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyectos::all();

        return view('Pagos.index')
                ->with('contrato',$contrato)
                ->with('valorContrato',$valorContrato)

                ->with('firmantes',$firmantes)
                ->with('firmantes_cliente_VAL',$firmantes_cliente_VAL)
                ->with('firmantes_proveedor_VAL',$firmantes_proveedor_VAL)
                ->with('firmantes_cliente_OS',$firmantes_cliente_OS)
                ->with('firmantes_proveedor_OS',$firmantes_proveedor_OS)

                ->with('nroFirmantes_OS',$nroFirmantes_OS)
                ->with('cant_MAX_OS',$cant_MAX_OS)

                ->with('nroFirmantes_VAL',$nroFirmantes_VAL)
                ->with('cant_MAX_VAL',$cant_MAX_VAL)
                
                ->render();
    }

    public function pagosProyecto($idProyecto)
    {
        $proyecto = Proyectos::find($idProyecto);
        $contratos = $proyecto->contratos;

        foreach ($contratos as $key) {
            $pagos = Pagos::pagosContrato($key->id);
            return $pagos;
        }


        return view('Pagos.index')
                ->with('contrato',$contrato)
                ->with('valorContrato',$valorContrato)

                ->with('firmantes',$firmantes)
                ->with('firmantes_cliente_VAL',$firmantes_cliente_VAL)
                ->with('firmantes_proveedor_VAL',$firmantes_proveedor_VAL)
                ->with('firmantes_cliente_OS',$firmantes_cliente_OS)
                ->with('firmantes_proveedor_OS',$firmantes_proveedor_OS)

                ->with('nroFirmantes_OS',$nroFirmantes_OS)
                ->with('cant_MAX_OS',$cant_MAX_OS)

                ->with('nroFirmantes_VAL',$nroFirmantes_VAL)
                ->with('cant_MAX_VAL',$cant_MAX_VAL)
                
                ->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

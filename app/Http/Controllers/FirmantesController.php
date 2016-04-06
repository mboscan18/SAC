<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\Contratos;
use SAC\Presupuestos;
use SAC\FirmasValuacion;
use SAC\FirmasOrdenServicio;
use SAC\Firmantes;
use Session;
use Redirect;
use DB;

use SAC\Http\Requests;
use SAC\Http\Requests\ContratosRequest;
use SAC\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class FirmantesController extends Controller
{
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('auth');
        $this->middleware('residente',['only' => ['create','store','edit','update','destroy']]);
        $this->middleware('residente_sup',['only' => ['index']]);
        $this->middleware('administrador',['only' => ['showDeletes','restore']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firmantes = Firmantes::all();
        return view('Firmantes.index')
            ->with('firmantes', $firmantes)
            ->render();
    }

    public function firmasContrato($id_contrato)
    {

        $contrato = Contratos::find($id_contrato);
        $valorContrato = Presupuestos::valorContrato($id_contrato);
        $firmantes = Firmantes::allFirmantes();
        $firmantesOrdenServicio = FirmasOrdenServicio::firmasOrdenServicio($id_contrato);
        $firmantes_cliente_OS = array();
        $firmantes_proveedor_OS = array();
        $nroFirmantes_OS = Firmantes::nroFirmantesContrato($id_contrato);
        $nroFirmantes_VAL = Firmantes::nroFirmantesValuacion($id_contrato);


        $i = -1;
        $j = -1;
        foreach ($firmantesOrdenServicio as $key) {
            if ($key->empresa == 1) {
                $i++;
                $firmantes_cliente_OS[$i] = $key;
            }elseif ($key->empresa == 2) {
                $j++;
                $firmantes_proveedor_OS[$j] = $key;
            }
        }


        $firmantesValuacion = FirmasValuacion::firmasValuacion($id_contrato);
        $firmantes_cliente_VAL = array();
        $firmantes_proveedor_VAL = array();
        $i = -1;
        $j = -1;
        foreach ($firmantesValuacion as $key) {
            if ($key->empresa == 1) {
                $i++;
                $firmantes_cliente_VAL[$i] = $key;
            }elseif ($key->empresa == 2) {
                $j++;
                $firmantes_proveedor_VAL[$j] = $key;
            }
        }

        $cant_MAX_OS = 4;
        $cant_MAX_VAL = 5;

       return view('Firmantes.firmasValOrden')
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
        return view('Firmantes.create')->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Firmantes::create($request->all());

        Session::flash('message-sucess','Firmante Creado Correctamente');
        if(Session::has('origen')){
            $origen = Session::get('origen');
        }else{
            $origen = 0;
        }

        switch ($origen) {
                case 1:
                    return Redirect::to('/Firmantes');
                
                case 2:
                    $idContrato = Session::get('idContrato');
                    Session::flash('swFirmante',1);
                    return Redirect::to('/FirmasContrato/'.$idContrato);
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
        $firmante = Firmantes::find($id);
        return view('Firmantes.edit')
            ->with('firmante', $firmante)
            ->render();
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
        $firmante = Firmantes::find($id);
        $firmante->fill($request->all());
        $firmante->save();
        Session::flash('message-sucess','Firmante Actualizado Correctamente');
        return Redirect::to('/Firmantes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $firmante = Firmantes::find($id);
        $firmante->delete();
        Session::flash('message-sucess','Firmante Eliminado Correctamente');
        return Redirect::to('/Firmantes');
    }
}

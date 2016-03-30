<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\Retenciones;
use SAC\RetencionesContrato;
use SAC\Presupuestos;
use SAC\Contratos;
use Session;
use Redirect;


use SAC\Http\Requests;
use SAC\Http\Requests\RetencionesRequest;
use SAC\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class RetencionesController extends Controller
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
        $retenciones = Retenciones::all();
        return view('Retenciones.index')
            ->with('retenciones', $retenciones)
            ->render();
    }

    public function retencionesContrato($id_contrato)
    {   
        $contrato = Contratos::find($id_contrato);
        $valorContrato = Presupuestos::valorContrato($id_contrato);
        $retenciones = Retenciones::all();
        $retencionesContrato = RetencionesContrato::retencionesContrato($id_contrato);


        return view('Retenciones.retencionesContrato')
            ->with('contrato',$contrato)
            ->with('valorContrato',$valorContrato)

            ->with('retenciones', $retenciones)
            ->with('retencionesContrato', $retencionesContrato)

            ->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Retenciones.create')->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Retenciones::create($request->all());

        Session::flash('message-sucess','Retención Creado Correctamente');
        if(Session::has('origen')){
            $origen = Session::get('origen');
        }else{
            $origen = 0;
        }

        switch ($origen) {
                case 1:
                    return Redirect::to('/Retenciones');
                
                case 2:
                    $idContrato = Session::get('idContrato');
                    return Redirect::to('/RetencionesContrato/'.$idContrato);
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
        $retencion = Retenciones::find($id);
        return view('Retenciones.edit')
            ->with('retencion', $retencion)
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
        $retencion = Retenciones::find($id);
        $retencion->fill($request->all());
        $retencion->save();
        Session::flash('message-sucess','Retención Actualizado Correctamente');
        return Redirect::to('/Retenciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $retencion = Retenciones::find($id);
        $retencion->delete();
        Session::flash('message-sucess','Retención Eliminada Correctamente');
        return Redirect::to('/Retenciones');
    }
}

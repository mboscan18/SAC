<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\Presupuestos;
use SAC\Contratos;
use SAC\Valuaciones;
use SAC\Capitulos;
use SAC\OrdenServicio;
use SAC\Procedimientos;
use Session;
use Redirect;
use Input;
use DB;

use SAC\Http\Requests;
use SAC\Http\Requests\PresupuestosRequest;
use SAC\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class PresupuestosController extends Controller
{
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('auth');
        $this->middleware('residente_cont',['only' => ['create','store','edit','update','destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presupuestos = Presupuestos::all();
        $contratos = Contratos::all();

        return view('Presupuestos.index',compact('contratos','presupuestos'));
    }

    public function showPresupuesto($contrato)
    {
        $partida = null;
        $contratos = Contratos::find($contrato);
        $partidas = Presupuestos::partidas($contrato);
        $capitulos = Capitulos::all();
        $valorContrato = Presupuestos::valorContrato($contrato);
        $nroAdendum = OrdenServicio::ordenAdendum($contrato);
        $sw = 0;
        
        return view('Presupuestos.presupuestoContrato', compact('nroAdendum','contratos','partidas','capitulos','partida','sw','valorContrato'));      
    }

    public function showPresupuestoPartida($contrato, $idPartida)
    {

        $partida = Presupuestos::find($idPartida);
        $contratos = Contratos::find($contrato);
        $partidas = Presupuestos::partidas($contrato);
        $capitulos = Capitulos::all();
        $valorContrato = Presupuestos::valorContrato($contrato);
        $nroAdendum = OrdenServicio::ordenAdendum($contrato);
        $contrato = $contratos;
        $sw = 1;
        
        return view('Presupuestos.presupuestoContrato', compact('nroAdendum','contratos', 'contrato','partidas','capitulos','partida','sw','valorContrato'));      
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $capitulos = Capitulos::all();

        if(Session::has('contrato')){
            $contrato = Session::get('contrato');
        }else{
            return 'Error al recibir Contrato';
        }

        $valorContrato = Presupuestos::valorContrato($contrato->id);
        return view('Presupuestos.create',compact('contrato','valorContrato','capitulos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PresupuestosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PresupuestosRequest $request)
    {
        $nroAdendum = OrdenServicio::ordenAdendum(Input::get('contrato_id'));
        $nroAdendumact = $nroAdendum + 1;

        $presupuesto = new Presupuestos();
        $presupuesto->nro_Partida     = Input::get('nro_Partida');
        $presupuesto->contrato_id     = Input::get('contrato_id');
        $presupuesto->descripcion     = Input::get('descripcion');
        $presupuesto->unidad          = Input::get('unidad');
        $presupuesto->cantidad        = Input::get('cantidad');
        $presupuesto->monto_Total     = Input::get('monto_Total');
        $presupuesto->orden_Partida   = $nroAdendumact;
        $presupuesto->usuario         = Input::get('usuario');
        $presupuesto->precio_Unitario = Input::get('precio_Unitario');

        if (Input::get('capitulo_id') != "null") {
            $presupuesto->capitulo_id = Input::get('capitulo_id');
        }
        $presupuesto->save();

        $contrato = Contratos::find(Input::get('contrato_id'));
        $contrato->orden_adendum = $contrato->orden_adendum + 1;
        $contrato->save();

        if ($nroAdendum == -1) {
            Session::flash('message-sucess','Partida Creada Correctamente');
            return Redirect::to('/Presupuesto/'.Input::get('contrato_id'));
        }else{
            Session::flash('message-sucess','Partida Creada Correctamente');
            return Redirect::to('/Adendum/'.Input::get('contrato_id'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PresupuestosRequest $request, $id)
    {
        $presupuesto = Presupuestos::find($id);
        $presupuesto->nro_Partida     = Input::get('nro_Partida');
        $presupuesto->contrato_id     = Input::get('contrato_id');
        $presupuesto->descripcion     = Input::get('descripcion');
        $presupuesto->unidad          = Input::get('unidad');
        $presupuesto->cantidad        = Input::get('cantidad');
        $presupuesto->monto_Total     = Input::get('monto_Total');
        $presupuesto->orden_Variacion = $presupuesto->orden_Variacion + 1;
        $presupuesto->usuario         = Input::get('usuario');
        $presupuesto->precio_Unitario = Input::get('precio_Unitario');

        if (Input::get('capitulo_id') != "null") {
            $presupuesto->capitulo_id = Input::get('capitulo_id');
        }
        $presupuesto->save();

        $contrato = Contratos::find(Input::get('contrato_id'));
        $contrato->orden_adendum = $contrato->orden_adendum + 1;
        $contrato->save();
        
        Session::flash('message-sucess','Partida Editada Correctamente');
        return Redirect::to('/Presupuesto/'.Input::get('contrato_id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $partida = Presupuestos::find($id);
        $nro = $partida->nro_Partida;
        $i=rand();

        $partida->nro_Partida = $nro.' - DELETED - '.$i;
        $partida->save();
        $partida->delete();

        if(Session::has('contrato')){
            $contrato = Session::get('contrato');
        }else{
            return 'Error al recibir Contrato';
        }

        Session::flash('message-sucess','Partida Eliminada Correctamente');
        return Redirect::to('/Presupuesto/'.$contrato->id);
    }
}

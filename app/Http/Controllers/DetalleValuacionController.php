<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\Valuaciones;
use SAC\DetalleValuacion;
use SAC\Presupuestos;
use SAC\CentrosCosto;
use SAC\OrdenServicio;
use SAC\VariacionPresupuesto;
use Session;
use Redirect;
use Input;
use DB;

use SAC\Http\Requests;
use SAC\Http\Controllers\Controller;
use SAC\Http\Requests\DetalleValuacionRequest;
use Illuminate\Contracts\Auth\Guard;

class DetalleValuacionController extends Controller
{
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('auth');
        $this->middleware('residente',['only' => ['create','store','edit','update','destroy']]);
        $this->middleware('administrador',['only' => ['showDeletes','restore']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function showDetalle($valuacion, $id_detalle)
    { 
        $valuaciones        = Valuaciones::find($valuacion);
        $detalleValuacion  = DetalleValuacion::detalleVal($valuacion);
        $cc                 = CentrosCosto::allCC();
        $valorContrato = Presupuestos::valorContrato($valuaciones->contrato_id);

        $contrato = $valuaciones->contrato;
        $nroAdendum = OrdenServicio::ordenAdendum($contrato->id);
        $partidas  = VariacionPresupuesto::partidasFirmadas($valuaciones->contrato_id, $nroAdendum);

       // return $partidas[0]->partida->precio_Unitario;
        if ($nroAdendum == -1) {
            Session::flash('message-info_OS','Debe firmar la Orden de Servicio para poder crear Valuaciones.');
        }else{
            if($nroAdendum < $contrato->orden_adendum){
                Session::flash('message-info_adendum','Debe firmar la Orden de Servicio para hacer valer la información del Adendum.');
            } 
        }

        if($nroAdendum < $contrato->orden_adendum){
                Session::flash('message-warning','firmar-adendum');
                Session::flash('origen',5);
            }

        $cantidadesDisponibles = array();
        $montosDisponibles = array();
        $i = 0;
        foreach ($partidas as $key) {
            $cant = DetalleValuacion::cantidadTrabajadaPartidaTotal($key->partida_id);
            $monto = DetalleValuacion::montoTrabajadaPartidaTotal($key->id);
            $cantidadesDisponibles[$i] = $key->cantidad - $cant;
            $montosDisponibles[$i] = $key->monto_Total - $monto;
            $i++;
        //return $cant;
        }


        $acumuladosPeriodo = array();
        $i = 0;
        foreach ($detalleValuacion as $key) {
            $acumuladosPeriodo[$i] = DetalleValuacion::montoTrabajadoPartidaPeriodo($key->id, $key->cc_id);
            $i++;
        }
       // return $acumuladosPeriodo[0]->CantidadAcumulada;

        if ($id_detalle == 'null') {
            $sw = 0;
            $detalle = null;
        }else{
            $sw = 1;
            $detalle = DetalleValuacion::find($id_detalle);
        }
       // return $detalleValuacion;
      //  return $detalle;

        return view('ValuacionesDetalle.detalleValuacion')
                ->with('contrato',$contrato)
                ->with('valorContrato',$valorContrato)

                ->with('valuaciones',$valuaciones)
                ->with('detalleValuacion',$detalleValuacion)
                ->with('partidas',$partidas)
                ->with('cc',$cc)
                ->with('cantidadesDisponibles',$cantidadesDisponibles)
                ->with('montosDisponibles',$montosDisponibles)
                ->with('acumuladosPeriodo',$acumuladosPeriodo)

                ->with('sw',$sw)
                ->with('detalle',$detalle)
                
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
    public function store(DetalleValuacionRequest $request)
    {
        $detalleValuacion = new DetalleValuacion();
        $detalleValuacion->cantidad_Realizada   = Input::get('cantidad_Realizada');
        $detalleValuacion->monto                = Input::get('monto');
        $detalleValuacion->partida_id           = Input::get('partida_id');
        $detalleValuacion->valuacion_id         = Input::get('valuacion_id');
        $detalleValuacion->usuario              = Input::get('usuario');
        if (Input::get('cc_id') != "null") {
            $detalleValuacion->cc_id = Input::get('cc_id');
        }
        $detalleValuacion->save();

        $valuacion = Valuaciones::find(Input::get('valuacion_id'));
        if($valuacion->nro_Valuacion == null){
            $ultimaValuacion = Valuaciones::nroUltimaValuacion($valuacion->contrato_id);
            $valuacion->nro_Valuacion = $ultimaValuacion[0]->nro_Valuacion + 1;
        }

        $avanceFinanciero = Presupuestos::avanceFinanciero($valuacion->contrato_id);
        $avanceFisico = Presupuestos::avanceFisico($valuacion->contrato_id);
        $valuacion->avance_financiero = $avanceFinanciero;
        $valuacion->avance_fisico = $avanceFisico;
        $valuacion->save();

        Session::flash('message-sucess','Movimiento de Partida Creado Correctamente');
        return Redirect::to('/DetalleValuacion/'.Input::get('valuacion_id').'/null');
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
    public function update(DetalleValuacionRequest $request, $id)
    {
        //return $request;
        $detalleValuacion = DetalleValuacion::find($id);
        $detalleValuacion->cantidad_Realizada   = Input::get('cantidad_Realizada');
        $detalleValuacion->monto                = Input::get('monto');
        $detalleValuacion->partida_id           = Input::get('partida_id');
        $detalleValuacion->valuacion_id         = Input::get('valuacion_id');
        $detalleValuacion->usuario              = Input::get('usuario');
        if (Input::get('cc_id') != "null") {
            $detalleValuacion->cc_id = Input::get('cc_id');
        }
        $detalleValuacion->save();

        $valuacion = Valuaciones::find(Input::get('valuacion_id'));
        $avanceFinanciero = Presupuestos::avanceFinanciero($valuacion->contrato_id);
        $avanceFisico = Presupuestos::avanceFisico($valuacion->contrato_id);
        $valuacion->avance_financiero = $avanceFinanciero;
        $valuacion->avance_fisico = $avanceFisico;
        $valuacion->save();

        Session::flash('message-sucess','Movimiento de Partida Editado Correctamente');
        return Redirect::to('/DetalleValuacion/'.Input::get('valuacion_id').'/null');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detalleValuacion = DetalleValuacion::find($id);

        $valuacion = Valuaciones::find($detalleValuacion->valuacion_id);
        $avanceFinanciero = Presupuestos::avanceFinanciero($valuacion->contrato_id);
        $avanceFisico = Presupuestos::avanceFisico($valuacion->contrato_id);
        $cantidadDetalle = DetalleValuacion::nroDetalleVal($valuacion->id);
        $valuacion->avance_financiero = $avanceFinanciero;
        $valuacion->avance_fisico = $avanceFisico;

        if($valuacion->nro_Valuacion != null){
            if ($cantidadDetalle == 1) {
              $valuacion->nro_Valuacion = null;
            }
        }
        $valuacion->save();
        $val = $detalleValuacion->valuacion_id;

        $detalleValuacion->delete();
        Session::flash('message-sucess','Movimiento de Partida Eliminado Correctamente');
        return Redirect::to('/DetalleValuacion/'.$valuacion->id.'/null');
    }
}

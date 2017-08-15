<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\Valuaciones;
use SAC\Anticipos;
use SAC\Descuentos;
use SAC\Presupuestos;
use SAC\OrdenServicio;
use Session;
use Redirect;
use Input;
use DB;

use SAC\Http\Requests;
use SAC\Http\Controllers\Controller;
use SAC\Http\Requests\AnticiposRequest;
use Illuminate\Contracts\Auth\Guard;

class AnticiposController extends Controller
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

    public function showAnticipo($idValuacion)
    {
        $valuacion = Valuaciones::find($idValuacion);
        $anticipos = Anticipos::anticipo($idValuacion);
        $valorContrato = Presupuestos::valorContrato($valuacion->contrato_id);
        $montoEjecutado = Presupuestos::montoEjecutadoContrato($valuacion->contrato_id);
        $montoAnticipos = Anticipos::totalAnticipo($valuacion->contrato_id,1);
        $montoAdelantos = Anticipos::totalAnticipo($valuacion->contrato_id,2);
        $montoAmortizaciones = Descuentos::totalDescuentosHastaPeriodo($valuacion->contrato_id,1,$valuacion->nro_Boletin);
        $montoDescuentos = Descuentos::totalDescuentosHastaPeriodo($valuacion->contrato_id,2,$valuacion->nro_Boletin);

        $contrato = $valuacion->contrato;
        $nroAdendum = OrdenServicio::ordenAdendum($contrato->id);

        if ($nroAdendum == -1) {
            Session::flash('message-info_OS','Debe firmar la Orden de Servicio para poder crear Valuaciones.');
        }else{
            if($nroAdendum < $contrato->orden_adendum){
                Session::flash('message-info_adendum','Debe firmar la Orden de Servicio para hacer valer la información del Adendum.');
            } 
        }

        if($nroAdendum < $contrato->orden_adendum){
                Session::flash('message-warning','firmar-adendum');
                Session::flash('origen',6);
            }

        $montoFaltante = $valorContrato - ($montoEjecutado + $montoAnticipos + $montoAdelantos - $montoAmortizaciones - $montoDescuentos);
        $porcentajeFaltante = ($montoFaltante * 100) / $valorContrato;

        $sw = 0;
    
        return view('Anticipos.anticipoValuacion')
                ->with('contrato',$contrato)
                ->with('valorContrato',$valorContrato)

                ->with('valuacion',$valuacion)
                ->with('anticipos',$anticipos)
                ->with('montoFaltante',$montoFaltante)
                ->with('porcentajeFaltante',$porcentajeFaltante)

                ->with('montoEjecutado',$montoEjecutado)
                ->with('montoAnticipos',$montoAnticipos)
                ->with('montoAdelantos',$montoAdelantos)
                ->with('sw',$sw)
                
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
        $anticipo = new Anticipos();
        $anticipo->concepto_Anticipo    = Input::get('concepto_Anticipo');
        $anticipo->porcentaje_Anticipo  = Input::get('porcentaje_Anticipo');
        $anticipo->monto_Anticipo       = Input::get('monto_Anticipo');
        $anticipo->tipo_Anticipo        = Input::get('tipo_Anticipo');
        $anticipo->valuacion_id         = Input::get('valuacion_id');
        $anticipo->usuario              = Input::get('usuario');
        $anticipo->save();

        $valuacion = Valuaciones::find(Input::get('valuacion_id'));
        $avanceFinanciero = Presupuestos::avanceFinanciero($valuacion->contrato_id);
        $avanceFisico = Presupuestos::avanceFisico($valuacion->contrato_id);
        $valuacion->avance_financiero = $avanceFinanciero;
        $valuacion->avance_fisico = $avanceFisico;
        $valuacion->save();

        if (Input::get('tipo_Anticipo') == 1) {
            Session::flash('message-sucess','Anticipo Creado Correctamente');
        }elseif (Input::get('tipo_Anticipo') == 2) {
            Session::flash('message-sucess','Adelanto de Factura Creado Correctamente');
        }
        return Redirect::to('/Anticipo/'.Input::get('valuacion_id'));
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
        $anticipo = Anticipos::find($id);
        $idValuacion = $anticipo->valuacion_id;
        $valuacion = Valuaciones::find($idValuacion);
        $anticipos = Anticipos::anticipo($idValuacion);
        $valorContrato = Presupuestos::valorContrato($valuacion->contrato_id);
        $montoEjecutado = Presupuestos::montoEjecutadoContrato($valuacion->contrato_id);
        $montoAnticipos = Anticipos::totalAnticipo($valuacion->contrato_id,1);
        $montoAdelantos = Anticipos::totalAnticipo($valuacion->contrato_id,2);
        $montoAmortizaciones = Descuentos::totalDescuentosHastaPeriodo($valuacion->contrato_id,1,$valuacion->nro_Boletin);
        $montoDescuentos = Descuentos::totalDescuentosHastaPeriodo($valuacion->contrato_id,2,$valuacion->nro_Boletin);

        $contrato = $valuacion->contrato;
        $nroAdendum = OrdenServicio::ordenAdendum($contrato->id);

        if ($nroAdendum == -1) {
            Session::flash('message-info_OS','Debe firmar la Orden de Servicio para poder crear Valuaciones.');
        }else{
            if($nroAdendum < $contrato->orden_adendum){
                Session::flash('message-info_adendum','Debe firmar la Orden de Servicio para hacer valer la información del Adendum.');
            } 
        }

        if($nroAdendum < $contrato->orden_adendum){
                Session::flash('message-warning','firmar-adendum');
                Session::flash('origen',6);
            }

        $montoFaltante = $valorContrato - ($montoEjecutado + $montoAnticipos + $montoAdelantos - $montoAmortizaciones - $montoDescuentos);
        $porcentajeFaltante = ($montoFaltante * 100) / $valorContrato;

        $sw = 1;
    
        return view('Anticipos.anticipoValuacion')
                ->with('contrato',$contrato)
                ->with('valorContrato',$valorContrato)

                ->with('valuacion',$valuacion)
                ->with('anticipos',$anticipos)
                ->with('anticipo',$anticipo)
                ->with('montoFaltante',$montoFaltante)
                ->with('porcentajeFaltante',$porcentajeFaltante)

                ->with('montoEjecutado',$montoEjecutado)
                ->with('montoAnticipos',$montoAnticipos)
                ->with('montoAdelantos',$montoAdelantos)
                ->with('sw',$sw)
                
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
        $anticipo = Anticipos::find($id);
        $anticipo->concepto_Anticipo    = Input::get('concepto_Anticipo');
        $anticipo->porcentaje_Anticipo  = Input::get('porcentaje_Anticipo');
        $anticipo->monto_Anticipo       = Input::get('monto_Anticipo');
        $anticipo->tipo_Anticipo        = Input::get('tipo_Anticipo');
        $anticipo->valuacion_id         = Input::get('valuacion_id');
        $anticipo->usuario              = Input::get('usuario');
        $anticipo->save();

        $valuacion = Valuaciones::find(Input::get('valuacion_id'));
        $avanceFinanciero = Presupuestos::avanceFinanciero($valuacion->contrato_id);
        $avanceFisico = Presupuestos::avanceFisico($valuacion->contrato_id);
        $valuacion->avance_financiero = $avanceFinanciero;
        $valuacion->avance_fisico = $avanceFisico;
        $valuacion->save();

        if (Input::get('tipo_Anticipo') == 1) {
            Session::flash('message-sucess','Anticipo Creado Correctamente');
        }elseif (Input::get('tipo_Anticipo') == 2) {
            Session::flash('message-sucess','Adelanto de Factura Editado Correctamente');
        }
        return Redirect::to('/Anticipo/'.Input::get('valuacion_id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anticipo = Anticipos::find($id);
        $anticipo->delete();

        $valuacion = Valuaciones::find($anticipo->valuacion_id);
        $avanceFinanciero = Presupuestos::avanceFinanciero($valuacion->contrato_id);
        $avanceFisico = Presupuestos::avanceFisico($valuacion->contrato_id);
        $valuacion->avance_financiero = $avanceFinanciero;
        $valuacion->avance_fisico = $avanceFisico;
        $valuacion->save();
        if ($anticipo->tipo_Anticipo == 1) {
            Session::flash('message-sucess','Anticipo Eliminado Correctamente');
        }else{
            Session::flash('message-sucess','Adelanto de Factura Eliminado Correctamente');
        }
        return Redirect::to('/Anticipo/'.$anticipo->valuacion_id);
    }
}

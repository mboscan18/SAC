<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\Valuaciones;
use SAC\Descuentos;
use SAC\Presupuestos;
use SAC\Anticipos;
use SAC\DetalleValuacion;
use SAC\OrdenServicio;
use Session;
use Redirect;
use Input;
use DB;

use SAC\Http\Requests;
use SAC\Http\Controllers\Controller;
use SAC\Http\Requests\DescuentosRequest;
use Illuminate\Contracts\Auth\Guard;

class DescuentosController extends Controller
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

    public function showDescuentos($idValuacion)
    {
        $valuacion = Valuaciones::find($idValuacion);
        $descuentos2 = Descuentos::descuento($idValuacion);
        $valorContrato = Presupuestos::valorContrato($valuacion->contrato_id);
        $montoEjecutadoValuacion = DetalleValuacion::montoTrabajadoValucion($idValuacion);
        $montoAnticipos = Anticipos::totalAnticipo($valuacion->contrato_id,1);
        $montoAdelantos = Anticipos::totalAnticipo($valuacion->contrato_id,2);
        $descuentosAnticipos = Descuentos::totalDescuentos($valuacion->contrato_id,1);
        $descuentosAdelantos = Descuentos::totalDescuentos($valuacion->contrato_id,2);

        $montoAnticipos_Porcentaje      = ($montoAnticipos * 100) / $valorContrato;
        $montoAdelantos_Porcentaje      = ($montoAdelantos * 100) / $valorContrato;

        if ($montoAnticipos == 0) {
            $descuentosAnticipos_Porcentaje = 0;
            $diferenciaAnticipos = 0;
            $diferenciaAnticipos_Porcentaje = 0;
        }else{
            $descuentosAnticipos_Porcentaje = ($descuentosAnticipos * 100) / $montoAnticipos;
            $diferenciaAnticipos = $montoAnticipos - $descuentosAnticipos;
            $diferenciaAnticipos_Porcentaje = ($diferenciaAnticipos * 100) / $montoAnticipos;
        }

        if ($montoAdelantos == 0) {
            $descuentosAdelantos_Porcentaje = 0;
            $diferenciaAdelantos = 0;
            $diferenciaAdelantos_Porcentaje = 0;
        }else{
            $descuentosAdelantos_Porcentaje = ($descuentosAdelantos * 100) / $montoAdelantos;
            $diferenciaAdelantos = $montoAdelantos - $descuentosAdelantos;
            $diferenciaAdelantos_Porcentaje = ($diferenciaAdelantos * 100) / $montoAdelantos;
        }

        //return 'Anticipo: '.$diferenciaAnticipos_Porcentaje.', '.number_format($descuentosAdelantos_Porcentaje*1, 2, ',','.').', Adelantos: '.number_format($diferenciaAdelantos_Porcentaje, 2, ',','.');
        $porcentajeEjecutadoValuacion = ($montoEjecutadoValuacion * 100) / $valorContrato;

        $descuentos = array();
        $acumuladoDescuentosAnticipos = 0;
        $acumuladoDescuentosAdelantos = 0;
        $i = 0;
        foreach ($descuentos2 as $key) {
            $descuentos[$i] = Descuentos::find($key->id);
            if ($key->tipo_Deduccion == 1) {
                $acumuladoDescuentosAnticipos = $acumuladoDescuentosAnticipos + $key->monto_Deduccion;
            }elseif ($key->tipo_Deduccion == 2) {
                $acumuladoDescuentosAdelantos = $acumuladoDescuentosAdelantos + $key->monto_Deduccion;
            }
            $i++;
        }

        $montoEjecutadoValuacionConDescuentos = $montoEjecutadoValuacion - $acumuladoDescuentosAnticipos - $acumuladoDescuentosAdelantos;

        if ($montoEjecutadoValuacion == 0) {
            $porcentajeDescuentosAnticipoValuacion = 0;
            $porcentajeDescuentosAdelantosValuacion = 0;
            $porcentajeEjecutadoConDescuentos = 0;
        }else{
            $porcentajeDescuentosAnticipoValuacion = ($acumuladoDescuentosAnticipos * 100) / $montoEjecutadoValuacion;
            $porcentajeDescuentosAdelantosValuacion = ($acumuladoDescuentosAdelantos * 100) / $montoEjecutadoValuacion;
            $porcentajeEjecutadoConDescuentos = ($montoEjecutadoValuacionConDescuentos * 100) / $montoEjecutadoValuacion;
        }

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
                Session::flash('origen',7);
            }

        return view('Descuentos.descuentoValuacion')
                ->with('contrato',$contrato)
                ->with('valuacion',$valuacion)
                ->with('descuentos',$descuentos)
                ->with('valorContrato',$valorContrato)
                ->with('montoEjecutadoValuacion',$montoEjecutadoValuacion)
                ->with('porcentajeEjecutadoValuacion',$porcentajeEjecutadoValuacion)

                ->with('montoAnticipos',$montoAnticipos)
                ->with('montoAdelantos',$montoAdelantos)
                ->with('descuentosAnticipos',$descuentosAnticipos)
                ->with('descuentosAdelantos',$descuentosAdelantos)

                ->with('montoAnticipos_Porcentaje',$montoAnticipos_Porcentaje)
                ->with('montoAdelantos_Porcentaje',$montoAdelantos_Porcentaje)
                ->with('descuentosAnticipos_Porcentaje',$descuentosAnticipos_Porcentaje)
                ->with('descuentosAdelantos_Porcentaje',$descuentosAdelantos_Porcentaje)

                ->with('diferenciaAnticipos',$diferenciaAnticipos)
                ->with('diferenciaAdelantos',$diferenciaAdelantos)
                ->with('diferenciaAnticipos_Porcentaje',$diferenciaAnticipos_Porcentaje)
                ->with('diferenciaAdelantos_Porcentaje',$diferenciaAdelantos_Porcentaje)

                ->with('montoEjecutadoValuacionConDescuentos',$montoEjecutadoValuacionConDescuentos)
                ->with('acumuladoDescuentosAnticipos',$acumuladoDescuentosAnticipos)
                ->with('acumuladoDescuentosAdelantos',$acumuladoDescuentosAdelantos)

                ->with('porcentajeDescuentosAnticipoValuacion',$porcentajeDescuentosAnticipoValuacion)
                ->with('porcentajeDescuentosAdelantosValuacion',$porcentajeDescuentosAdelantosValuacion)
                ->with('porcentajeEjecutadoConDescuentos',$porcentajeEjecutadoConDescuentos)

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
        $descuento = new Descuentos();
        $descuento->porcentaje_Deduccion    = Input::get('porcentaje_Deduccion');
        $descuento->monto_Deduccion         = Input::get('monto_Deduccion');
        $descuento->tipo_Deduccion          = Input::get('tipo_Deduccion');
        $descuento->usuario                 = Input::get('usuario');
        $descuento->valuacion_id            = Input::get('valuacion_id');
        $descuento->save();

        $valuacion = Valuaciones::find(Input::get('valuacion_id'));
        $avanceFinanciero = Presupuestos::avanceFinanciero($valuacion->contrato_id);
        $valuacion->avance_financiero = $avanceFinanciero;
        $valuacion->save();

        if (Input::get('tipo_Deduccion') == 1) {
            Session::flash('message-sucess','Amortización de Anticipo Aplicada Correctamente');
        }elseif (Input::get('tipo_Deduccion') == 2) {
            Session::flash('message-sucess','Descuento sobre valuacion Creado Correctamente');
        }
        return Redirect::to('/Descuento/'.Input::get('valuacion_id'));
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

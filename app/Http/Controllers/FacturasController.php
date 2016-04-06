<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\Valuaciones;
use SAC\Contratos;
use SAC\Presupuestos;
use SAC\RetencionesFactura;
use SAC\RetencionesContrato;
use SAC\Facturas;
use SAC\Anticipos;
use SAC\Descuentos;
use Input;
use Session;
use Redirect;

use SAC\Http\Requests;
use SAC\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class FacturasController extends Controller
{
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('auth');
        $this->middleware('residente',['only' => ['create','store','edit','update','destroy']]);
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

    public function ordenarPago($id_valuacion)
    {
        $valuacion = Valuaciones::find($id_valuacion);
        $contrato = Contratos::find($valuacion->contrato_id);
        $valorContrato = Presupuestos::valorContrato($valuacion->contrato_id);
        $retencionesContrato = RetencionesContrato::retencionesContrato($valuacion->contrato_id);

        $detallesValuacion = $valuacion->detallesValuacion;
        $monto_Valuado = 0;
        foreach ($detallesValuacion as $key) {
            $monto_Valuado = $monto_Valuado + $key->monto;
        }

        $descuentos = $valuacion->descuentos;
        $descuentosAnticipos = 0;
        $descuentosAdelantos = 0;
        foreach ($descuentos as $key) {
            if ($key->tipo_Deduccion == 1) {
                $descuentosAnticipos = $descuentosAnticipos + $key->monto_Deduccion;
            }elseif ($key->tipo_Deduccion == 2) {
                $descuentosAdelantos = $descuentosAdelantos + $key->monto_Deduccion;
            }
        }

        $adelantos = $valuacion->anticipos;
        $montoAnticipos = 0;
        $montoAdelantos = 0;
        foreach ($adelantos as $key) {
            if ($key->tipo_Anticipo == 1) {
                $montoAnticipos = $montoAnticipos + $key->monto_Anticipo;
            }elseif ($key->tipo_Anticipo == 2) {
                $montoAdelantos = $montoAdelantos + $key->monto_Anticipo;
            }
        }


        $IVA = $valuacion->IVA;
        $monto_Neto = $monto_Valuado;
        $monto_IVA = ($monto_Neto * $IVA) / 100;
        $monto_Total = $monto_Neto + $monto_IVA + $montoAnticipos + $montoAdelantos - $descuentosAnticipos - $descuentosAdelantos;

        return view('Facturas.envioPago')
            ->with('valorContrato',$valorContrato)
            ->with('valuacion',$valuacion)
            ->with('contrato',$contrato)

            ->with('retencionesContrato',$retencionesContrato)
            ->with('monto_Valuado',$monto_Valuado)
            ->with('monto_IVA',$monto_IVA)
            ->with('monto_Total',$monto_Total)

            ->with('montoAnticipos',$montoAnticipos)
            ->with('montoAdelantos',$montoAdelantos)
            ->with('descuentosAnticipos',$descuentosAnticipos)
            ->with('descuentosAdelantos',$descuentosAdelantos)
            
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
        $valuacion = Valuaciones::find(Input::get('valuacion'));

        $detallesValuacion = $valuacion->detallesValuacion;
        $monto_Valuado = 0;
        foreach ($detallesValuacion as $key) {
            $monto_Valuado = $monto_Valuado + $key->monto;
        }

        $descuentos = $valuacion->descuentos;
        $monto_Descuentos = 0;
        foreach ($descuentos as $key) {
            $monto_Descuentos = $monto_Descuentos + $key->monto_Deduccion;
        }

        $adelantos = $valuacion->anticipos;
        $monto_Adelanto = 0;
        foreach ($adelantos as $key) {
            $monto_Adelanto = $monto_Adelanto + $key->monto_Anticipo;
        }

        $IVA = $valuacion->IVA;
        $monto_Neto = $monto_Valuado;
        $monto_IVA = ($monto_Neto * $IVA) / 100;
        $monto_Total = $monto_Neto + $monto_IVA + $monto_Adelanto - $monto_Descuentos;

        $factura = new Facturas();
        $factura->fecha_Emision = Input::get('fecha_Emision');
        $factura->tipo_Factura = Input::get('tipo_Factura');
        $factura->valuacion_id = Input::get('valuacion');
        $factura->usuario = Input::get('usuario');
        $factura->monto_Neto = $monto_Neto;
        $factura->monto_IVA = $monto_IVA;
        $factura->monto_Total = $monto_Total;
        $factura->save();

        $factura = Facturas::facturaPorValuacion($valuacion->id);

        $i = 0;
        $monto_Total_Retenciones = 0;
        if (Input::get('retenciones') != null) {
            foreach (Input::get('retenciones') as $key) {
                $porcentaje = Input::get('porcentaje')[$i];
                $sustraendo = Input::get('sustraendo')[$i];
                $monto_Retenido = Input::get('monto_Retenido')[$i];

                $retencion = new RetencionesFactura();
                $retencion->retenciones_id = Input::get('retenciones')[$i];
                $retencion->factura_id = $factura->id;
                $retencion->porcentaje_Retencion = $porcentaje;
                $retencion->sustraendo = $sustraendo;
                $retencion->monto_Retenido = $monto_Retenido;
                $retencion->usuario = Input::get('usuario');
                $retencion->save();

               // echo 'retenciones_id: '.Input::get('retenciones')[$i].',<br> factura_id: '.$factura->id;
                $monto_Total_Retenciones = $monto_Total_Retenciones + $monto_Retenido;
                $i++;
            }
            $monto_Aplicando_Retenciones = $monto_Total - $monto_Total_Retenciones;
        }
       // return 'Monto Retenciones: '.$monto_Total_Retenciones.', Monto Total Sin retenciones '.$monto_Total.', Monto Total: '.$monto_Aplicando_Retenciones;

        Session::flash('message-sucess','Boletín enviado a Pagar Correctamente.');
        return Redirect::to('/OpcionesValuacion/'.$valuacion->id);

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

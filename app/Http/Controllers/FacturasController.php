<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\Valuaciones;
use SAC\Facturas;
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
        $monto_Neto = $monto_Valuado + $monto_Adelanto - $monto_Descuentos;
        $monto_IVA = ($monto_Neto * $IVA) / 100;
        $monto_Total = $monto_Neto + $monto_IVA;
        return 'Monto sin IVA: '.$monto_Neto.', Monto IVA: '.$monto_IVA.', Monto Total: '.$monto_Total;
        $factura = new Facturas();

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

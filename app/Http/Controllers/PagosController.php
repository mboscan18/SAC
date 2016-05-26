<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\Proyectos;
use SAC\Contratos;
use SAC\Valuaciones;
use SAC\Presupuestos;
use SAC\TiposPago;
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

        $resumenProyectos = array();
        $i = 0;
        foreach ($proyectos as $key) {
            $resumenProyectos[$i] = Proyectos::reumenProyecto($proyectos[2]->id);
        return $resumenProyectos[$i];
            $i++;
        }

        return view('Pagos.index')
                ->with('resumenProyectos',$resumenProyectos)
                ->render();
    }

    public function pagosProyecto($idProyecto)
    {
        $proyecto = Proyectos::find($idProyecto);
        $contratos = $proyecto->contratos;

        $resumenProyecto = Proyectos::reumenContratos($idProyecto);


        return view('Pagos.pagosProyecto')
                ->with('resumenProyecto',$resumenProyecto)
                ->with('proyecto',$proyecto)
                
                ->render();
    }

    public function pagosContrato($idContrato)
    {
        $contrato = Contratos::find($idContrato);
        $valuaciones = $contrato->valuaciones;

        $resumenValuaciones = array();
        $i = 0;
        foreach ($valuaciones as $key) {
            $resumenValuaciones[$i] = Valuaciones::resumenValuacion($key->id);
            $i++;
        }

        return view('Pagos.pagosContrato')
                ->with('resumenValuaciones',$resumenValuaciones)
                ->with('contrato',$contrato)
                
                ->render();
    }

    public function pagosBoletin($idBoletin)
    {
        $valuacion = Valuaciones::find($idBoletin);
        $contrato = $valuacion->contrato;
        $factura = $valuacion->factura;
        $pagos = $factura->pagos;

        $valorContrato = Presupuestos::valorContrato($contrato->id);

        return view('Pagos.pagosBoletin')
                ->with('valorContrato',$valorContrato)
                ->with('valuacion',$valuacion)
                ->with('contrato',$contrato)
                ->with('pagos',$pagos)
                ->with('factura',$factura)
                
                ->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearPago($idBoletin)
    {
        $valuacion = Valuaciones::find($idBoletin);
        $factura = $valuacion->factura;
        $retenciones = $factura->retenciones;
        $montoRetenciones = 0;
        foreach ($retenciones as $key) {
            $montoRetenciones = $montoRetenciones + $key->monto_Retenido;
        }
        $resumenValuacion = Valuaciones::resumenValuacion($idBoletin);

        $totalPagar = $montoRetenciones + $factura->monto_Total;
        $contrato = $valuacion->contrato;
        $valorContrato = Presupuestos::valorContrato($contrato->id);
        $datosBancarios = $contrato->empresaProveedor->datosBancarios;
        $tiposPago = TiposPago::all();

        return view('Pagos.create')
                ->with('valorContrato',$valorContrato)
                ->with('valuacion',$valuacion)
                ->with('contrato',$contrato)
                ->with('factura',$factura)
                ->with('montoRetenciones',$montoRetenciones)
                ->with('resumenValuacion',$resumenValuacion)

                ->with('datosBancarios',$datosBancarios)
                ->with('tiposPago',$tiposPago)
                
                ->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pagos::create($request->all());
        Session::flash('message-sucess','Pago Creado Correctamente');
        $valuacion = Session::get('valuacion');

        return Redirect::to('/PagosBoletin/'.$valuacion);  
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

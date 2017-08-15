<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\Valuaciones;
use SAC\DetalleValuacion;
use SAC\Contratos;
use SAC\Presupuestos;
use SAC\CentrosCosto;
use SAC\OrdenServicio;
use SAC\Anticipos;
use SAC\FirmasValuacion;
use SAC\Descuentos;
use SAC\Procedimientos;
use Session;
use Redirect;
use Input;
use DB;

use SAC\Http\Requests;
use SAC\Http\Controllers\Controller;
use SAC\Http\Requests\ValuacionesRequest;
use Illuminate\Contracts\Auth\Guard;

class ValuacionesController extends Controller
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
        $valuaciones = Valuaciones::all();
        //return $valuaciones[0]->user->nombre_Usuario;
        return view('Valuaciones.index',compact('valuaciones'));
    }

    public function showValuacion($id_contrato)
    {
        $contrato = Contratos::find($id_contrato);
        $valuaciones = Valuaciones::valuaciones($id_contrato);
        $nroLastBoletin = Valuaciones::nroUltimoBoletin($id_contrato);
        $valorContrato = Presupuestos::valorContrato($id_contrato);

        $estadoValuacion = array();
        $i = 0;
        foreach ($valuaciones as $key) {
            $estadoValuacion[$i] = Valuaciones::estadoValuacion($key->id);
           // return $estadoValuacion;
            $i++;
        }

        $IVA = $contrato->IVA;

        $nroAdendum = OrdenServicio::ordenAdendum($id_contrato);

        if ($nroAdendum == -1) {
            Session::flash('message-info_OS','Debe firmar la Orden de Servicio para poder crear Valuaciones.');
        }else{
            if($nroAdendum < $contrato->orden_adendum){
                Session::flash('message-info_adendum','Debe firmar la Orden de Servicio para hacer valer la información del Adendum.');
            } 
        }

        if($nroAdendum < $contrato->orden_adendum){
                Session::flash('message-warning','firmar-adendum');
                Session::flash('origen',3);
            }

        
        if ($nroLastBoletin == null) {
            $nroBoletin = 1;
        }else{
            $nroBoletin = $nroLastBoletin[0]->nro_Boletin + 1;            
        } 

        return view('Valuaciones.valuacionesContrato', compact('contrato','valuaciones','nroBoletin','IVA','valorContrato','estadoValuacion'));     
    }

    public function pagosBoletin($idBoletin)
    {
        $valuacion = Valuaciones::find($idBoletin);
        $contrato = $valuacion->contrato;
        $factura = $valuacion->factura;
        if ($factura){
            $pagos = $factura->pagos;
        }else{
            $pagos = [];
        }

        $pagos = null;
        $retenciones = null;
        $resumenValuacion = null;
        $montoRetenciones = 0;
        if($factura != null){
            $pagos = $valuacion->factura->pagos;
            $retenciones = $factura->retenciones;
            foreach ($retenciones as $key) {
                $montoRetenciones = $montoRetenciones + $key->monto_Retenido;
            }
        }
            $resumenValuacion = Valuaciones::resumenValuacion($idBoletin);

        $valorContrato = Presupuestos::valorContrato($contrato->id);

        return view('Valuaciones.pagosValuacion')
                ->with('valorContrato',$valorContrato)
                ->with('valuacion',$valuacion)
                ->with('contrato',$contrato)
                ->with('pagos',$pagos)
                
                ->with('resumenValuacion',$resumenValuacion)
                ->with('factura',$factura)
                ->with('montoRetenciones',$montoRetenciones)
                ->render();
    }

    public function opcionesValuacion($id_valuacion)
    {
        $valuacion = Valuaciones::find($id_valuacion);
        $contrato = Contratos::find($valuacion->contrato->id);
        $valorContrato = Presupuestos::valorContrato($valuacion->contrato->id);

        $factura = $valuacion->factura;
        $pagos = null;
        $retenciones = null;
        $resumenValuacion = null;
        $montoRetenciones = 0;
        if($factura != null){
            $pagos = $valuacion->factura->pagos;
            $retenciones = $factura->retenciones;
            foreach ($retenciones as $key) {
                $montoRetenciones = $montoRetenciones + $key->monto_Retenido;
            }
            $resumenValuacion = Valuaciones::resumenValuacion($id_valuacion);
        }

        $estadoValuacion = Valuaciones::estadoValuacion($id_valuacion);

        
        $valuacionIsTrabajada = Valuaciones::valuacionIsTrabajada($id_valuacion);
        $valuacionIsFirmada = Valuaciones::valuacionIsFirmada($id_valuacion);
        $nroAdendum = OrdenServicio::ordenAdendum($contrato->id);

        $detalleIsTrabajado = Valuaciones::detalleIsTrabajado($id_valuacion);
        $anticipoIsTrabajado = Valuaciones::anticipoIsTrabajado($id_valuacion);
        $descuentoIsTrabajado = Valuaciones::descuentoIsTrabajado($id_valuacion);

    // Validar si hay Orden de Servicio Pendiente por Firmar

        if ($nroAdendum == -1) {
            Session::flash('message-info_OS','Debe firmar la Orden de Servicio para poder crear Valuaciones.');
        }else{
            if($nroAdendum < $contrato->orden_adendum){
                Session::flash('message-info_adendum','Debe firmar la Orden de Servicio para hacer valer la información del Adendum.');
            } 
        }

    /* Validar que si hay Orden de Servicio Pendiente por Firmar no se pueden 
        crear valuaciones en caso de ser la primera Orden de Servicio nada mas */

        if($nroAdendum < $contrato->orden_adendum){
                Session::flash('message-warning','firmar-adendum');
                Session::flash('origen',4);
            }

    // Validar si hay Valuacion pendiente por enviar a Pagar
            //return $valuacionIsFirmada.'  -  '.$valuacionIsTrabajada;

        if (($valuacionIsTrabajada > 0) && ($valuacionIsFirmada == 0)) {
            Session::flash('message-warning_2','firmar-valuacion');
            Session::flash('origen',1);
        }

         return view('Valuaciones.opcionesValuacion')
                ->with('contrato',$contrato)
                ->with('valorContrato',$valorContrato)

                ->with('valuacion',$valuacion)
                ->with('estadoValuacion',$estadoValuacion)
                ->with('detalleIsTrabajado',$detalleIsTrabajado)
                ->with('anticipoIsTrabajado',$anticipoIsTrabajado)
                ->with('descuentoIsTrabajado',$descuentoIsTrabajado)
                ->with('valuacionIsTrabajada',$valuacionIsTrabajada)
                ->with('pagos',$pagos)
                
                ->with('resumenValuacion',$resumenValuacion)
                ->with('factura',$factura)
                ->with('montoRetenciones',$montoRetenciones)
                
                ->render();
    }

    public function generarBoletinValuacion($id_valuacion, $tipoReporte){
        $valuacion = Valuaciones::find($id_valuacion); 
        $partidas  = Presupuestos::partidas($valuacion->contrato_id);
        $detalleValuacion2  = DetalleValuacion::detalleVal($id_valuacion);
        $montoTrabajadoValuacion = DetalleValuacion::montoTrabajadoValucion($id_valuacion);

        $montoAnticiposTotal = Anticipos::totalAnticipoHastaPeriodo($valuacion->contrato_id,1, $valuacion->nro_Boletin);
        $montoAdelantosTotal = Anticipos::totalAnticipoHastaPeriodo($valuacion->contrato_id,2, $valuacion->nro_Boletin);
        $descuentosAnticiposTotal = Descuentos::totalDescuentosHastaPeriodo($valuacion->contrato_id,1, $valuacion->nro_Boletin);
        $descuentosAdelantosTotal = Descuentos::totalDescuentosHastaPeriodo($valuacion->contrato_id,2, $valuacion->nro_Boletin);
        

        if ($valuacion->nro_Boletin > 1) {
            $valuacion_Anterior = Valuaciones::valuacionPorBoletin($valuacion->contrato_id, $valuacion->nro_Boletin-1);
            
            $montoAnticiposTotal_Anterior = Anticipos::totalAnticipoHastaPeriodo($valuacion->contrato_id,1, $valuacion->nro_Boletin-1);
            $montoAdelantosTotal_Anterior = Anticipos::totalAnticipoHastaPeriodo($valuacion->contrato_id,2, $valuacion->nro_Boletin-1);
            $descuentosAnticiposTotal_Anterior = Descuentos::totalDescuentosHastaPeriodo($valuacion->contrato_id,1, $valuacion->nro_Boletin-1);
            $descuentosAdelantosTotal_Anterior = Descuentos::totalDescuentosHastaPeriodo($valuacion->contrato_id,2, $valuacion->nro_Boletin-1);
            
            $montoAnticiposValuacion_Anterior = Anticipos::totalAnticipoValuacion($valuacion_Anterior->id,1);
            $montoAdelantosValuacion_Anterior = Anticipos::totalAnticipoValuacion($valuacion_Anterior->id,2);
            $descuentosAnticiposValuacion_Anterior = Descuentos::totalDescuentosValuacion($valuacion_Anterior->id,1);
            $descuentosAdelantosValuacion_Anterior = Descuentos::totalDescuentosValuacion($valuacion_Anterior->id,2);

            $diferenciaAnticipos_Anterior = $montoAnticiposTotal_Anterior - $descuentosAnticiposTotal_Anterior;
            $diferenciaAdelantos_Anterior = $montoAdelantosTotal_Anterior - $descuentosAdelantosTotal_Anterior;
            
            $diferenciaAdelantosValuacion_Anterior = $montoAdelantosValuacion_Anterior - $descuentosAdelantosValuacion_Anterior;
        }else{
            $montoAnticiposTotal_Anterior = 0;
            $montoAdelantosTotal_Anterior = 0;
            $descuentosAnticiposTotal_Anterior = 0;
            $descuentosAdelantosTotal_Anterior = 0;
            
            $montoAnticiposValuacion_Anterior = 0;
            $montoAdelantosValuacion_Anterior = 0;
            $descuentosAnticiposValuacion_Anterior = 0;
            $descuentosAdelantosValuacion_Anterior = 0;

            $diferenciaAnticipos_Anterior = 0;
            $diferenciaAdelantos_Anterior = 0;
            
            $diferenciaAdelantosValuacion_Anterior = 0;
        }
        
        $montoAnticiposValuacion = Anticipos::totalAnticipoValuacion($valuacion->id,1);
        $montoAdelantosValuacion = Anticipos::totalAnticipoValuacion($valuacion->id,2);
        $descuentosAnticiposValuacion = Descuentos::totalDescuentosValuacion($valuacion->id,1);
        $descuentosAdelantosValuacion = Descuentos::totalDescuentosValuacion($valuacion->id,2);

        $diferenciaAnticipos = $montoAnticiposTotal - $descuentosAnticiposTotal;
        $diferenciaAdelantos = $montoAdelantosTotal - $descuentosAdelantosTotal;

        $diferenciaAdelantosValuacion = $montoAdelantosValuacion - $descuentosAdelantosValuacion;

        $IVA = $valuacion->IVA;

        $montoPagarValuacion = $montoTrabajadoValuacion + $montoAnticiposValuacion - $descuentosAnticiposValuacion + $diferenciaAdelantosValuacion;

        $nombreReporte = 'Contrato ('.$valuacion->contrato->nro_Contrato.') - Boletin de Valuacion N° '.$valuacion->nro_Boletin;
        $valorContrato = Presupuestos::valorContrato($valuacion->contrato_id);
        $cc = CentrosCosto::all();

        $acumuladosPartida = array();
        $i = 0;
        if ($tipoReporte == 1) {
            foreach ($partidas as $key) {
                foreach ($cc as $costo) {
                    $temp = DetalleValuacion::AcumuladoPartida($key->id, $valuacion->nro_Boletin, $costo->id);
                    if (is_string($temp)) {
                        Session::flash('message-error','Error en los datos de la Partida '.$key->nro_Partida.'. Revisar Descripcion de Partida. &nbsp; &nbsp;&nbsp;&nbsp;ERROR: &nbsp; '.$temp);
                        return Redirect::to('/Boletines/'.$valuacion->contrato_id);
                    }
                   // return $temp;
                    if ($temp->CantidadAcumulada != 0) {
                        $acumuladosPartida[$i] = $temp;
                        //return $acumuladosPartida;
                        $i++;
                    }
                }
            }
        }else{
            foreach ($partidas as $key) {
                foreach ($cc as $costo) {
                    $temp = DetalleValuacion::AcumuladoPartida($key->id, $valuacion->nro_Boletin, $costo->id);
                    if (is_string($temp)) {
                        Session::flash('message-error','Error en los datos de la Partida '.$key->nro_Partida.'. Revisar Descripcion de Partida. &nbsp; &nbsp;&nbsp;&nbsp;ERROR: &nbsp; '.$temp);
                        return Redirect::to('/Boletines/'.$valuacion->contrato_id);
                    }
                    if ($i > 0) {
                        if ($temp != $acumuladosPartida[$i-1]) {
                            $acumuladosPartida[$i] = $temp;
                            $i++;
                                                        
                        }
                    }else{
                        $acumuladosPartida[$i] = $temp;
                        $i++;
                    }
                    
                }
            }
        }
       // return $acumuladosPartida;

        $acumuladosPartida_auxiliar = array();
        $i = 0;
        if ($tipoReporte == 2) {
            foreach ($acumuladosPartida as $key) {
                // Si el movimiento esta asociado a un CC
                if ($key->CC != 0) {
                    $acumuladosPartida_auxiliar[$i] = $key;
                    $i++;
                }else{
                    if ($key->CantidadAcumulada != 0) {
                        $acumuladosPartida_auxiliar[$i] = $key;
                        $i++;   
                    }else{
                        $sw = 0;
                        foreach ($acumuladosPartida as $key_segundo){
                            if ($key_segundo != $key) {
                                if ($key_segundo->Partida == $key->Partida){
                                    if ($key_segundo->CantidadAcumulada != 0) {
                                        $sw ++;
                                    }
                                }
                            }
                        }
                        if ($sw == 0) {
                            $acumuladosPartida_auxiliar[$i] = $key;
                            $i++; 
                        }
                    }
                }

            }
            $acumuladosPartida = $acumuladosPartida_auxiliar;
        }

        $detalleValuacion = array();
        foreach ($detalleValuacion2 as $key) {
            $detalleValuacion[$i] = DetalleValuacion::find($key->id);
            $i++;
        }

        $proyectoDescripcion = Procedimientos::stringSeparado($valuacion->contrato->proyecto->nombre_Proyecto, 177);
        $contratoDescripcion = Procedimientos::stringSeparado($valuacion->contrato->descripcion, 150);

        $firmasValuacion = FirmasValuacion::firmasValuacion($valuacion->contrato_id);
        $firmantes_cliente = array();
        $firmantes_proveedor = array();
        $i = -1;
        $j = -1;
        foreach ($firmasValuacion as $key) {
            if ($key->empresa == 1) {
                $i++;
                $firmantes_cliente[$i] = $key;
            }elseif ($key->empresa == 2) {
                $j++;
                $firmantes_proveedor[$j] = $key;
            }
        }

        if (($firmantes_cliente == null) || ($firmantes_proveedor == null)) {
            Session::flash('message-warning','Debe cargar Firmantes sobre la Valuacion.');
            return Redirect::to('/FirmasContrato/'.$valuacion->contrato_id);
        }

        $Total_PrecioTotal = 0;
        $Total_MontoEjecutado = 0;
        $Total_MontoAcumulado = 0;
        $Total_MontoAnterior = 0;

        foreach($acumuladosPartida as $datos){
            $cantAnterior = $datos->CantidadAcumulada - $datos->CantidadTrabajada;
            $montoAnterior = $datos->MontoAcumulado - $datos->MontoTrabajado;
            $Total_MontoEjecutado = $Total_MontoEjecutado + $datos->MontoTrabajado;
            $Total_MontoAcumulado = $Total_MontoAcumulado + $datos->MontoAcumulado;
            $Total_MontoAnterior = $Total_MontoAnterior + $montoAnterior;
            $Total_PrecioTotal = $Total_PrecioTotal + $datos->PrecioTotal;
            
        }

        $MontoActualIdeal = $Total_PrecioTotal - $Total_MontoAnterior;
        $diferenciaMontoActual = $MontoActualIdeal - $Total_MontoEjecutado;
        $diferenciaMontoTotal = $Total_PrecioTotal - $Total_MontoAcumulado;
        if ($diferenciaMontoActual < 1) {
          $Total_MontoEjecutado = $Total_MontoEjecutado + $diferenciaMontoActual;
        }
        if ($diferenciaMontoTotal < 1) {
          $Total_MontoAcumulado = $Total_MontoAcumulado + $diferenciaMontoTotal;
        }

        $IVA_Total_MontoAnterior = (($Total_MontoAnterior/100) * $IVA);
          $IVA_Total_MontoEjecutado = (($Total_MontoEjecutado/100) * $IVA);
          $IVA_Total_MontoAcumulado = (($Total_MontoAcumulado/100) * $IVA);

          $Total_MontoAnterior_conIVA = $IVA_Total_MontoAnterior + $Total_MontoAnterior;
          $Total_MontoEjecutado_conIVA = $IVA_Total_MontoEjecutado + $Total_MontoEjecutado;
          $Total_MontoAcumulado_conIVA = $IVA_Total_MontoAcumulado + $Total_MontoAcumulado;

          $Total_MontoEjecutado_conIVA_Neto = $Total_MontoEjecutado_conIVA + $montoAnticiposValuacion + $montoAdelantosValuacion;
          $Total_MontoEjecutado_conIVA_Neto_Anterior = $Total_MontoAnterior_conIVA + $montoAnticiposValuacion_Anterior + $montoAdelantosValuacion_Anterior;
          $Total_MontoAcumulado_conIVA_Neto = $Total_MontoAcumulado_conIVA + $montoAnticiposTotal + $montoAdelantosTotal;
    
    

        $pdf = \PDF::loadHTML(
            view('Reportes.boletinValuacion')
                ->with('valuacion',$valuacion)
                ->with('detalleValuacion',$detalleValuacion)
                ->with('acumuladosPartida',$acumuladosPartida)
                ->with('IVA',$IVA)
                ->with('nombreReporte',$nombreReporte)
                ->with('valorContrato',$valorContrato)
                ->with('montoPagarValuacion',$montoPagarValuacion)

                ->with('montoAnticiposTotal',$montoAnticiposTotal)
                ->with('montoAdelantosTotal',$montoAdelantosTotal)
                ->with('descuentosAnticiposTotal',$descuentosAnticiposTotal)
                ->with('descuentosAdelantosTotal',$descuentosAdelantosTotal)
                ->with('montoAnticiposTotal_Anterior',$montoAnticiposTotal_Anterior)
                ->with('montoAdelantosTotal_Anterior',$montoAdelantosTotal_Anterior)
                ->with('descuentosAnticiposTotal_Anterior',$descuentosAnticiposTotal_Anterior)
                ->with('descuentosAdelantosTotal_Anterior',$descuentosAdelantosTotal_Anterior)

                ->with('montoAnticiposValuacion',$montoAnticiposValuacion)
                ->with('montoAdelantosValuacion',$montoAdelantosValuacion)
                ->with('descuentosAnticiposValuacion',$descuentosAnticiposValuacion)
                ->with('descuentosAdelantosValuacion',$descuentosAdelantosValuacion)
                ->with('montoAnticiposValuacion_Anterior',$montoAnticiposValuacion_Anterior)
                ->with('montoAdelantosValuacion_Anterior',$montoAdelantosValuacion_Anterior)
                ->with('descuentosAnticiposValuacion_Anterior',$descuentosAnticiposValuacion_Anterior)
                ->with('descuentosAdelantosValuacion_Anterior',$descuentosAdelantosValuacion_Anterior)

                ->with('diferenciaAnticipos',$diferenciaAnticipos)
                ->with('diferenciaAdelantos',$diferenciaAdelantos)
                ->with('diferenciaAnticipos_Anterior',$diferenciaAnticipos_Anterior)
                ->with('diferenciaAdelantos_Anterior',$diferenciaAdelantos_Anterior)

                ->with('diferenciaAdelantosValuacion_Anterior',$diferenciaAdelantosValuacion_Anterior)
                ->with('diferenciaAdelantosValuacion',$diferenciaAdelantosValuacion)

                ->with('proyectoDescripcion',$proyectoDescripcion)
                ->with('contratoDescripcion',$contratoDescripcion)

                ->with('firmantes_cliente',$firmantes_cliente)
                ->with('firmantes_proveedor',$firmantes_proveedor)

                ->with('Total_PrecioTotal',$Total_PrecioTotal)
                ->with('Total_MontoEjecutado',$Total_MontoEjecutado)
                ->with('Total_MontoAcumulado',$Total_MontoAcumulado)
                ->with('Total_MontoAnterior',$Total_MontoAnterior)                

                ->with('MontoActualIdeal',$MontoActualIdeal)
                ->with('diferenciaMontoActual',$diferenciaMontoActual)
                ->with('diferenciaMontoTotal',$diferenciaMontoTotal)

                ->with('IVA_Total_MontoAnterior',$IVA_Total_MontoAnterior)
                ->with('IVA_Total_MontoEjecutado',$IVA_Total_MontoEjecutado)
                ->with('IVA_Total_MontoAcumulado',$IVA_Total_MontoAcumulado)

                ->with('Total_MontoAnterior_conIVA',$Total_MontoAnterior_conIVA)
                ->with('Total_MontoEjecutado_conIVA',$Total_MontoEjecutado_conIVA)
                ->with('Total_MontoAcumulado_conIVA',$Total_MontoAcumulado_conIVA)

                ->with('Total_MontoEjecutado_conIVA_Neto',$Total_MontoEjecutado_conIVA_Neto)
                ->with('Total_MontoEjecutado_conIVA_Neto_Anterior',$Total_MontoEjecutado_conIVA_Neto_Anterior)
                ->with('Total_MontoAcumulado_conIVA_Neto',$Total_MontoAcumulado_conIVA_Neto)
                ->render()
            );

        return $pdf->setPaper('letter')->setOrientation('landscape')->stream($nombreReporte.'.pdf');  
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
    public function store(ValuacionesRequest $request)
    {
        $nroLastBoletin = Valuaciones::nroUltimoBoletin(Input::get('contrato_id'));
        $nroAdendum = OrdenServicio::ordenAdendum(Input::get('contrato_id'));
        $contrato = Contratos::find(Input::get('contrato_id'));       
       // return $nroAdendum;

        if ($nroAdendum == -1) {
            Session::flash('message-error','Debe firmar la Orden de Servicio para poder crear Valuaciones.');
            return Redirect::to('/Boletines/'.Input::get('contrato_id'));
        }/*else{
            if ($nroLastBoletin != null) {
                $lastValuacion = Valuaciones::valuacionPorBoletin(Input::get('contrato_id'), $nroLastBoletin[0]->nro_Boletin);
                if ($lastValuacion->lista == 'N') 
                {
                    Session::flash('message-error_valuacion','Debe ordenar el pago del Boletín '.$nroLastBoletin[0]->nro_Boletin.' antes de crear uno Nuevo.');
                    Session::flash('valuacion',$lastValuacion->id);
                    return Redirect::to('/Boletines/'.Input::get('contrato_id'));
                }
            }else{
                Valuaciones::create($request->all());
                $boletin = Valuaciones::valuacionPorBoletin(Input::get('contrato_id'), Input::get('nro_Boletin'));
                Session::flash('message-sucess','Boletín Creado Correctamente');
                return Redirect::to('/OpcionesValuacion/'.$boletin->id);
            }
        }*/
        Valuaciones::create($request->all());
                $boletin = Valuaciones::valuacionPorBoletin(Input::get('contrato_id'), Input::get('nro_Boletin'));
                Session::flash('message-sucess','Boletín Creado Correctamente');
                return Redirect::to('/OpcionesValuacion/'.$boletin->id);
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
        $valuacion = Valuaciones::find($id);
        $contrato = Contratos::find($valuacion->contrato_id);
        $valorContrato = Presupuestos::valorContrato($valuacion->contrato->id);
        
        return view('Valuaciones.edit')
                ->with('contrato',$contrato)
                ->with('valorContrato',$valorContrato)
                ->with('valuacion',$valuacion)
                
                ->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValuacionesRequest $request, $id)
    {
        $valuacion = Valuaciones::find($id);
        $valuacion->fill($request->all());
        $valuacion->save();
        Session::flash('message-sucess','Boletín de Valuación Actualizado Correctamente');
        return Redirect::to('/OpcionesValuacion/'.$valuacion->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $valuacion = Valuaciones::find($id);
        $valuacion->delete();
        Session::flash('message-sucess','Boletín de Valuación Eliminado Correctamente');
        return Redirect::to('/Boletines/'.$valuacion->contrato->id);
    }
}

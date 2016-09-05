<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\Proyectos;
use SAC\Contratos;
use SAC\Valuaciones;
use SAC\Presupuestos;
use SAC\TiposPago;
use SAC\User;
use SAC\Pagos;
use Session;
use Redirect;
use DB;

use SAC\Http\Requests;
use SAC\Http\Requests\PagosRequest;
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
        $j = 0;
        for ($i=0; $i < sizeof($proyectos); $i++) { 
            $resumenProyectos[$j] = Proyectos::reumenProyecto($proyectos[$i]->id);
            $j++;
        }

        //return $j;
        //return $resumenProyectos;

        return view('Pagos.index')
                ->with('resumenProyectos',$resumenProyectos)
                ->render();
    }

    public function pagosPendientes()
    {

        if (($this->auth->user()->rol_Usuario == 'supervisor') || ($this->auth->user()->rol_Usuario == 'administrador')){
            $allproyectos = Proyectos::all();
            if (!$allproyectos){
                Session::flash('message-error','No hay Proyectos cargados en el Sistema.');
                return Redirect::to('/Home/');
            }
        }else{
            $user = User::find($this->auth->user()->id);
            $asignaciones = $user->asignacionesProyecto;
            if ($asignaciones){
                $allproyectos = array();
                $i = 0;
                foreach ($asignaciones as $key) {
                    $allproyectos[$i] = $key->proyecto;
                    $i++;
                }
            }else{
                Session::flash('message-error','Usted no Administra ningún Proyecto.');
                return Redirect::to('/Home/');
            }
        }

        $proyectos = array();
        $j = 0;
        //return $allproyectos;
        for ($i=0; $i < sizeof($allproyectos); $i++) { 
            $proyectos[$i] = $allproyectos[$i];
        }
        //return $proyectos;


        $resumenPagosPendientes = array();
        $i = 0;

        foreach ($proyectos as $proy) {
            $contratos = $proy->contratos;
        //return $contratos;
            //echo "Proy: ".$proy->id."<br>";
            foreach ($contratos as $contra) {
                $boletines = $contra->valuaciones;
            //echo "&nbsp; &nbsp; &nbsp; Contra: ".$contra->id."<br>";
        //return $boletines;
                
                foreach ($boletines as $key) {
                    if ($key->factura != null) {

            //echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Boletin: ".$key->id;
            //echo "Boletin: ".$key->id."&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;";
                        $temp = Valuaciones::resumenValuacionExtended($key->id);
                        //echo "Proy: {$temp->codProyecto} | Cont: {$temp->codContrato} | Bol: {$temp->nro_Boletin} | Dif: {$temp->diferencia_pago} | User: {$temp->usuario}<br>";
                        if(($temp->diferencia_pago > 1) ){
                            if (($this->auth->user()->rol_Usuario == 'supervisor') || ($this->auth->user()->rol_Usuario == 'administrador')){
                                $resumenPagosPendientes[$i] = $temp;
                                $i++;
                            }else{
                                $us = $this->auth->user()->nombre_Usuario.' '.$this->auth->user()->apellido_Usuario;
                              //  echo 'Boletin: '.$key->id.'&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; jason: '.$temp->usuario_id.' - '.$temp->usuario.'&nbsp; &nbsp; / &nbsp; &nbsp;';
                               // echo 'autht: '.$this->auth->user()->id.' - '.$us.'<br>';
                                $us_A_Id = (Int)($this->auth->user()->id);
                                $us_J_Id = (Int)($temp->usuario_id);
                                if ($us_A_Id == $us_J_Id) {
                                    //echo "entro - ".$key->id."<br>";
                                    $resumenPagosPendientes[$i] = $temp;
                                    $i++;
                                }
                            }
                        }
                    }
                }
            }
        }
        //return;
        //return $resumenPagosPendientes;
        return view('Pagos.pagosPendientes')
                ->with('resumenPagosPendientes',$resumenPagosPendientes)
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
            if ($key->factura != null) {
                $resumenValuaciones[$i] = Valuaciones::resumenValuacion($key->id);
                $i++;
            }
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
        if ($factura){
            $pagos = $factura->pagos;
        }else{
            $pagos = [];
        }

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
    public function store(PagosRequest $request)
    {
        $valuacion = Session::get('valuacion');
        try {
                Pagos::create($request->all());
          } catch(PDOException $e){
                Session::flash('message-error','El Pago no pudo ser creado Correctamente. Error: '.$e);
                return Redirect::to('/PagosBoletin/'.$valuacion);  
         }
        Session::flash('message-sucess','Pago Creado Correctamente');

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
        $pago = Pagos::find($id);
        $valuacion = $pago->factura->valuacion;
        $factura = $pago->factura;
        $retenciones = $factura->retenciones;
        $montoRetenciones = 0;
        foreach ($retenciones as $key) {
            $montoRetenciones = $montoRetenciones + $key->monto_Retenido;
        }
        $resumenValuacion = Valuaciones::resumenValuacion($valuacion->id);
        $resumenValuacion->monto_pagado = $resumenValuacion->monto_pagado - $pago->monto_Pago;
        $resumenValuacion->diferencia_pago = $resumenValuacion->diferencia_pago + $pago->monto_Pago;

        $totalPagar = $montoRetenciones + $factura->monto_Total;
        $contrato = $valuacion->contrato;
        $valorContrato = Presupuestos::valorContrato($contrato->id);
        $datosBancarios = $contrato->empresaProveedor->datosBancarios;
        $tiposPago = TiposPago::all();

        return view('Pagos.edit')
                ->with('valorContrato',$valorContrato)
                ->with('valuacion',$valuacion)
                ->with('contrato',$contrato)
                ->with('factura',$factura)
                ->with('montoRetenciones',$montoRetenciones)
                ->with('resumenValuacion',$resumenValuacion)

                ->with('datosBancarios',$datosBancarios)
                ->with('tiposPago',$tiposPago)
                ->with('pago',$pago)
                
                ->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PagosRequest $request, $id)
    {
        $pago = Pagos::find($id);
        if (($pago->comprobante != null) && ($request->comprobante != null)){
            \Storage::delete($pago->comprobante);
        }
        $pago->fill($request->all());
        $pago->save();
        $valuacion = Session::get('valuacion');
        Session::flash('message-sucess','Pago Actualizado Correctamente');
        return Redirect::to('/PagosBoletin/'.$valuacion);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pago = Pagos::find($id);
        $valuacion = $pago->factura->valuacion->id;
        if ($pago->comprobante != null){
            \Storage::delete($pago->comprobante);
        }
        $pago->delete();
        Session::flash('message-sucess','Pago Eliminado Correctamente');
        return Redirect::to('/PagosBoletin/'.$valuacion);  
    }


    public function deleteFile($id)
    {
    //    return $request['logo'];
        $pago = Pagos::find($id);
        if ($pago->comprobante != null){
            DB::table('Pagos')
                ->where('id', $id)
                ->update(['comprobante' => null, 'usuario' => $this->auth->user()->id]);
            \Storage::delete($pago->comprobante);
        }
        return Redirect::to('/Pagos/'.$id.'/edit');
    }
}

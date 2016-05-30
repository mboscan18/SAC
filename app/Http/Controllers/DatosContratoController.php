<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\Contratos;
use SAC\Presupuestos;
use Input;
use Session;
use Redirect;
use DB;

use SAC\Http\Requests;
use SAC\Http\Requests\DatosContratoRequest;
use SAC\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class DatosContratoController extends Controller
{
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
        //
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

    public function generarResumenDatosContrato($id_contrato)
    {
        $contrato = Contratos::find($id_contrato);
        $nombreReporte = 'Contrato ('.$contrato->nro_Contrato.') - Datos del Contrato ';
        $valorContrato = Presupuestos::valorContrato($id_contrato);
        $retenciones = $contrato->retenciones;

        $pdf = \PDF::loadHTML(
            view('Reportes.datosContrato')
                ->with('contrato',$contrato)
                ->with('valorContrato',$valorContrato)
                ->with('nombreReporte',$nombreReporte)
                ->with('retenciones',$retenciones)

                ->render()
            );

        return $pdf->setPaper('letter')->setOrientation('portrait')->stream($nombreReporte.'.pdf');  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contrato = Contratos::find($id);
        $valorContrato = Presupuestos::valorContrato($id);

        
        return view('DatosContrato.datosContrato')
            ->with('contrato',$contrato)
            ->with('valorContrato',$valorContrato)

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
        $contrato = Contratos::find($id);
        $contrato->fill($request->all());
        $contrato->save();
        Session::flash('message-sucess','Datos del Contrato Actualizados Correctamente');
        return Redirect::to('/OpcionesContrato/'.$contrato->id);
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

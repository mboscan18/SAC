<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\TiposPago;
use Session;
use Redirect;
use DB;

use SAC\Http\Requests;
use SAC\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class TiposPagoController extends Controller
{
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposPago = TiposPago::all();
        return view('TiposPago.index',compact('tiposPago'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('TiposPago.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TiposPago::create($request->all());
        Session::flash('message-sucess','Tipo de PAgo Creado Correctamente');

        if(Session::has('origen_tipoPago')){
            $origen = Session::get('origen_tipoPago');
            $valuacion = Session::get('valuacion');
        }else{
            $origen = 0;
        }

        switch ($origen) {
                case 1:
                    return Redirect::to('/TiposPago');
                
                case 2:
                    return Redirect::to('/CrearPago/'.$valuacion);

                default: 
                    return Redirect::to('/TiposPago');    
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
        $tipoPago = TiposPago::find($id);
        return view('TiposPago.edit',compact('tipoPago'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tipoPago = TiposPago::find($id);
        $tipoPago->fill($request->all());
        $tipoPago->save();
        Session::flash('message-sucess','Tipo de Pago Actualizado Correctamente');
        return Redirect::to('/TiposPago');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoPago = TiposPago::find($id);
        $tipoPago->delete();
        Session::flash('message-sucess','Tipo de Pago Eliminado Correctamente');
        return Redirect::to('/TiposPago');
    }
}

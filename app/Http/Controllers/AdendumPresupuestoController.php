<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\Contratos;
use SAC\Presupuestos;
use Session;
use Redirect;
use Input;


use SAC\Http\Requests;
use SAC\Http\Requests\AdendumPresupuestoRequest;
use SAC\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class AdendumPresupuestoController extends Controller
{
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('auth');
        $this->middleware('residente',['only' => ['create','store','edit','update','destroy']]);
        $this->middleware('residente_sup',['only' => ['index']]);
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
        $partida = Presupuestos::find(Input::get('Partida_id_Seleccionada'));
       // return $partida;
        $partida->fill($request->all());
        $partida->save();

        $contrato = Contratos::find(Input::get('contrato_id'));
        $contrato->orden_adendum = $contrato->orden_adendum + 1;
        $contrato->save();

        Session::flash('message-sucess','Partida Actualizada Correctamente');
        return Redirect::to('/Adendum/ '.Input::get('contrato_id'));
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

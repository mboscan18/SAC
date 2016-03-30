<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\RetencionesContrato;
use Session;
use Redirect;
use Input;

use SAC\Http\Requests;
use SAC\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class RetencionesContratoController extends Controller
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
        RetencionesContrato::create($request->all());
        Session::flash('message-sucess','Retención Agregada Correctamente sobre el Contrato');
        return Redirect::to('/RetencionesContrato/'.Input::get('contrato_id'));
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
        $firma = RetencionesContrato::find($id);
        $firma->delete();

        // redirect
        Session::flash('message-sucess', 'Retención Removida del Contrato Correctamente');
        return Redirect::to('/RetencionesContrato/'.$firma->contrato_id);
    }
}

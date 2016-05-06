<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\TiposCuenta;
use Session;
use Redirect;
use DB;

use SAC\Http\Requests;
use SAC\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class TiposCuentaController extends Controller
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
        $tiposCuenta = TiposCuenta::all();
        return view('TiposCuenta.index',compact('tiposCuenta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('TiposCuenta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TiposCuenta::create($request->all());
        Session::flash('message-sucess','Tipo de Cuenta Creado Correctamente');
        return Redirect::to('/TiposCuenta');
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
        $tipoCuenta = TiposCuenta::find($id);
        return view('TiposCuenta.edit',compact('tipoCuenta'));
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
        $tipoCuenta = TiposCuenta::find($id);
        $tipoCuenta->fill($request->all());
        $tipoCuenta->save();
        Session::flash('message-sucess','Tipo de Cuenta Actualizado Correctamente');
        return Redirect::to('/TiposCuenta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoCuenta = TiposCuenta::find($id);
        $tipoCuenta->delete();
        Session::flash('message-sucess','Tipo de Cuenta Eliminado Correctamente');
        return Redirect::to('/TiposCuenta');
    }
}

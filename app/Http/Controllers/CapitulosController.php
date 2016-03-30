<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\Capitulos;
use Session;
use Redirect;

use SAC\Http\Requests;
use SAC\Http\Requests\CapitulosRequest;
use SAC\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class CapitulosController extends Controller
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
        $capitulos = Capitulos::all();
        return view('Capitulos.index',compact('capitulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Capitulos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CapitulosRequest $request)
    {
        Capitulos::create($request->all());
        Session::flash('message-sucess','Capitulo Creado Correctamente');
        return Redirect::to('/Capitulos');
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
        $capitulo = Capitulos::find($id);
        return view('Capitulos.edit',['capitulo'=>$capitulo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CapitulosRequest $request, $id)
    {
        $capitulo = Capitulos::find($id);
        $capitulo->fill($request->all());
        $capitulo->save();
        Session::flash('message-sucess','Capitulo Actualizado Correctamente');
        return Redirect::to('/Capitulos');
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

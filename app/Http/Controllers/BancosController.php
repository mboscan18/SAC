<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\Bancos;
use Session;
use Redirect;
use DB;

use SAC\Http\Requests;
use SAC\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class BancosController extends Controller
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
        
        $bancos = Bancos::all();
        return view('Bancos.index',compact('bancos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Bancos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Bancos::create($request->all());

        Session::flash('message-sucess','Banco Creado Correctamente');
        if(Session::has('origen_banco')){
            $origen = Session::get('origen_banco');
        }else{
            $origen = 0;
        }

        switch ($origen) {
                case 1:
                    return Redirect::to('/Bancos');
                
                case 2:
                    return Redirect::to('/DatosBancarios/create');

                default: 
                    return Redirect::to('/Bancos');    
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
        $banco = Bancos::find($id);
        return view('Bancos.edit',compact('banco'));
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
        $banco = Bancos::find($id);
        if (($banco->logo != null) && ($request->logo != null)){
            \Storage::delete($banco->logo);
        }
        $banco->fill($request->all());
        $banco->save();
        Session::flash('message-sucess','Banco Actualizado Correctamente');
        return Redirect::to('/Bancos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banco = Bancos::find($id);
        if ($banco->logo != null){
            \Storage::delete($banco->logo);
        }
        $banco->delete();  
        Session::flash('message-sucess','Banco Eliminado Correctamente');
        return Redirect::to('/Bancos');
    }

    public function deleteFile($id)
    {
    //    return $request['logo'];
        $banco = Bancos::find($id);
        if ($banco->logo != null){
            $banco->logo = null;
            $banco->usuario = $this->auth->user()->id;
            $banco->save();
            \Storage::delete($banco->logo);
        }
        return Redirect::to('/Bancos/'.$id.'/edit');
    }
}

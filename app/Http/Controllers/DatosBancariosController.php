<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\DatosBancarios;
use SAC\Empresas;
use SAC\TiposCuenta;
use SAC\Bancos;
use Session;
use Redirect;
use DB;

use SAC\Http\Requests;
use SAC\Http\Requests\DatosBancariosRequest;
use SAC\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class DatosBancariosController extends Controller
{
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('auth');
        $this->middleware('residente_cont',['only' => ['create','store','edit','update','destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = DatosBancarios::paginate(10);
        return view('DatosBancarios.index',compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresas::all();
        $tiposCuenta = TiposCuenta::all();
        $bancos = Bancos::all();
        $cont1=0;
        foreach ($empresas as $var) {
            $cont1++;
        }
        if($cont1 == 0){
            Session::flash('message-error','Es necesario tener Empresas Creadas para crear Datos Bancarios');
            return Redirect::to('/Contratos');
        }
        return view('DatosBancarios.create',compact('empresas','tiposCuenta','bancos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DatosBancariosRequest $request)
    {
        DatosBancarios::create($request->all());
        Session::flash('message-sucess','Dato Bancario Creado Correctamente');

         if(Session::has('origen_DatosBancarios')){
            $origen = Session::get('origen_DatosBancarios');
            $valuacion = Session::get('valuacion');
        }else{
            $origen = 0;
        }

        switch ($origen) {
                case 1:
                    return Redirect::to('/DatosBancarios');
                
                case 2:
                    return Redirect::to('/CrearPago/'.$valuacion);

                default: 
                    return Redirect::to('/DatosBancarios');    
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
        $datos = DatosBancarios::find($id);
        $empresas = Empresas::all();
        $tiposCuenta = TiposCuenta::all();
        $bancos = Bancos::all();

        return view('DatosBancarios.edit')
            ->with('datos',$datos)
            ->with('empresas',$empresas)
            ->with('bancos',$bancos)
            ->with('tiposCuenta',$tiposCuenta)

            ->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DatosBancariosRequest $request, $id)
    {
        $datos = DatosBancarios::find($id);
        $datos->fill($request->all());
        $datos->save();
        Session::flash('message-sucess','Dato Bancario Actualizado Correctamente');
        return Redirect::to('/DatosBancarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datos = DatosBancarios::find($id);
        DB::table('DatosBancarios')
            ->where('id', $id)
            ->update(['usuario' => $this->auth->user()->id]);

        $datos->delete();  
        Session::flash('message-sucess','Dato Bancario Eliminado Correctamente');
        return Redirect::to('/DatosBancarios');
    }
}

<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\CentrosCosto;
use Session;
use Redirect;
use DB;

use SAC\Http\Requests;
use SAC\Http\Requests\CentrosCostoRequest;
use SAC\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class CentrosCostoController extends Controller
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
    public function index(Request $request)
    {
        $cc = CentrosCosto::paginate(10);
        if($request->ajax()){
            return response()->json(view('CentrosCosto.cc',compact('cc'))->render());
        }
        return view('CentrosCosto.index',compact('cc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CentrosCosto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CentrosCostoRequest $request)
    {
        CentrosCosto::create($request->all());
        Session::flash('message-sucess','Centro de Costo Creado Correctamente');
        return Redirect::to('/CentrosCosto');
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
    public function edit($cod_CC)
    {
        $cc = CentrosCosto::find($cod_CC);
        return view('CentrosCosto.edit',['cc'=>$cc]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CentrosCostoRequest $request, $cod_CC)
    {
        $cc = CentrosCosto::find($cod_CC);
        $cc->fill($request->all());
        $cc->save();
        Session::flash('message-sucess','Cento de Costo Actualizado Correctamente');
        return Redirect::to('/CentrosCosto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cod_CC)
    {
        $cc = CentrosCosto::find($cod_CC);
        DB::table('CentrosCosto')
            ->where('id', $cod_CC)
            ->update(['usuario' => $this->auth->user()->id]);
            
        $cc->delete();
        Session::flash('message-sucess','Centro de Costo Eliminado Correctamente');
        return Redirect::to('/CentrosCosto');
    }
}

<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\Proyectos;
use SAC\Empresas;
use SAC\CentrosCosto;
use SAC\AsignacionProyectos;
use Input;
use Session;
use Redirect;
use DB;

use SAC\Http\Requests;
use SAC\Http\Requests\ProyectosRequest;
use SAC\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class ProyectosController extends Controller
{
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('auth');
        $this->middleware('residente',['only' => ['create','store','edit','update','destroy']]);
        $this->middleware('residente_sup',['only' => ['index']]);
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

    public function showProyectos($user)
    {
        if (($this->auth->user()->rol_Usuario == 'administrador') || ($this->auth->user()->rol_Usuario == 'supervisor')) {
                $proyectos = Proyectos::all();
        }else{
            $asignaciones = AsignacionProyectos::asignaciones($user);
            $proyectos = array();
            $i = 0;
            foreach ($asignaciones as $key) {
                $proyectos[$i] = $key->proyecto;
                $i++;
            }
        }       
        return view('Proyectos.index',compact('proyectos'));
    }

    
    public function opcionesProyecto($id_proyecto)
    {
        $proyecto = Proyectos::find($id_proyecto);

        return view('Proyectos.opcionesProyecto',compact('proyecto'));
    }


    public function showDeletes()
    {
        $proyectos = Proyectos::onlyTrashed()->paginate(10);
        return view('Proyectos.deleted',compact('proyectos'));

    }

    public function restore($id)
    {
        DB::table('Proyectos')
            ->where('id', $id)
            ->update(['deleted_at' => null]);
        
        Session::flash('message-sucess','Proyecto Restaurado Correctamente.');
        return Redirect::to('/ProyectosDeleted');
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresas::lists('nombre_Empresa', 'id');
        $cc = CentrosCosto::lists('descripcion_CC', 'id');
        return view('Proyectos.create',compact('empresas','cc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProyectosRequest $request)
    {
        Proyectos::create($request->all());
        $proyecto = Proyectos::proyectoPorCodigo(Input::get('cod_Proyecto'));

        $asignacion = new AsignacionProyectos();
        $asignacion->usuario_id = $this->auth->user()->id;
        $asignacion->usuario = $this->auth->user()->id;
        $asignacion->proyecto_id = $proyecto[0]->id;
        $asignacion->save();
        
        Session::flash('message-sucess','Proyecto Creado Correctamente');
        return Redirect::to('/ProyectosUsuario/'.$this->auth->user()->id);
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
        $proyectos = Proyectos::find($id);
        $empresas = Empresas::lists('nombre_Empresa', 'id');
        return view('Proyectos.edit',['proyectos'=>$proyectos, 'empresas'=>$empresas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProyectosRequest $request, $id)
    {
        $proyectos = Proyectos::find($id);
        $proyectos->fill($request->all());
        $proyectos->save();
        Session::flash('message-sucess','Proyecto Actualizado Correctamente');
        return Redirect::to('/OpcionesProyecto/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proyectos = Proyectos::find($id);
        $proyectos->delete();
        Session::flash('message-sucess','Proyecto Eliminado Correctamente');
        return Redirect::to('/Proyectos');
    }
}

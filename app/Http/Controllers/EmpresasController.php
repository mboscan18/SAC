<?php 

namespace SAC\Http\Controllers;
 
use Illuminate\Http\Request;
use SAC\Empresas;
use Session;
use Redirect;
use DB;

use SAC\Http\Requests;
use SAC\Http\Requests\EmpresasRequest;
use SAC\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class EmpresasController extends Controller
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
    public function index(Request $request)
    {
        $empresas = Empresas::all();
       /* if($request->ajax()){
            return response()->json(view('Empresas.empresas',compact('empresas'))->render());
        }*/
        return view('Empresas.index',compact('empresas'));

    }

    public function showDeletes()
    {
        $empresas = Empresas::onlyTrashed()->paginate(10);
        return view('Empresas.deleted',compact('empresas'));

    }

    public function restore($id)
    {
        DB::table('Empresas')
            ->where('id', $id)
            ->update(['deleted_at' => null]);
        
        Session::flash('message-sucess','Empresa Restaurada Correctamente.');
        return Redirect::to('/EmpresasDeleted');
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresasRequest $request)
    {
        Empresas::create($request->all());

        Session::flash('message-sucess','Empresa Creada Correctamente');
        if(Session::has('origen')){
            $origen = Session::get('origen');
        }else{
            $origen = 0;
        }

        switch ($origen) {
                case 1:
                    return Redirect::to('/Empresas');
                
                case 2:
                    return Redirect::to('/Proyectos/create');

                case 3:
                    return Redirect::to('/Contratos/create');

                default: 
                    return Redirect::to('/Empresas');    
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
    public function edit($codIdentificacion_Empresa)
    {
        $empresas = Empresas::find($codIdentificacion_Empresa);
        return view('Empresas.edit',['empresa'=>$empresas]);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresasRequest $request, $codIdentificacion_Empresa)
    {
        $empresas = Empresas::find($codIdentificacion_Empresa);
        if (($empresas->logo != null) && ($request->logo != null)){
            \Storage::delete($empresas->logo);
        }
        $empresas->fill($request->all());
        $empresas->save();
        Session::flash('message-sucess','Empresa Actualizada Correctamente');
        return Redirect::to('/Empresas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($codIdentificacion_Empresa)
    {
        $empresas = Empresas::find($codIdentificacion_Empresa);
        if ($empresas->logo != null){
            \Storage::delete($empresas->logo);
        }
        $sel1 = DB::table('DatosBancarios')
             ->select(DB::raw('count(*) as cant'))
             ->where('empresa_id', $codIdentificacion_Empresa)
             ->get();
       
        foreach ($sel1 as $var) {
            $cont1 = $var->cant;
        }

        if (($cont1 > 0)){
            Session::flash('message-error','No se puede eliminar esta empresa. Está involucrada en acciones del sistema.');
            return Redirect::to('/Empresas/'.$codIdentificacion_Empresa.'/edit');
        }else{
            DB::table('Empresas')
                ->where('id', $codIdentificacion_Empresa)
                ->update(['logo' => null, 'usuario' => $this->auth->user()->id]);
            
            $empresas->delete();
            Session::flash('message-sucess','Empresa Eliminada Correctamente');
            return Redirect::to('/Empresas');
        }
    }

    public function deleteFile($id)
    {
    //    return $request['logo'];
        $empresas = Empresas::find($id);
        if ($empresas->logo != null){
            DB::table('Empresas')
                ->where('id', $id)
                ->update(['logo' => null, 'usuario' => $this->auth->user()->id]);
            \Storage::delete($empresas->logo);
        }
        return Redirect::to('/Empresas/'.$id.'/edit');
    }
}

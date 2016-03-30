<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\User;
use Session;
use Redirect;
use DB;

use SAC\Http\Requests;
use SAC\Http\Requests\UserCreateRequest;
use SAC\Http\Requests\UserUpdateRequest;
use SAC\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class UserController extends Controller
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('auth');
        $this->middleware('administrador',['only' => ['create','store','destroy']]);
        $this->middleware('supervisor',['only' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $users = User::paginate(25);
        if($request->ajax()){
            return response()->json(view('Usuarios.users',compact('users'))->render());
        }
        return view('Usuarios.index',compact('users'));
        
       
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        try {
                User::create($request->all());
          } catch(PDOException $e){
                Session::flash('message-error','El Usuario no pudo ser creado Correctamente. Error: '.$e);
                return Redirect::to('/Usuarios');
         }
        
        Session::flash('message-sucess','Usuario Creado Correctamente');
        return Redirect::to('/Usuarios');
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
    public function edit($identificacion_Usuario)
    {
        if($this->auth->user()->id == $identificacion_Usuario){

            $users = User::find($identificacion_Usuario);
            return view('Usuarios.edit',['user'=>$users]);

        }elseif($this->auth->user()->id != $identificacion_Usuario){

            if ($this->auth->user()->rol_Usuario == 'administrador'){
                $users = User::find($identificacion_Usuario);
                return view('Usuarios.edit',['user'=>$users]);
            }

            Session::flash('message-error','No tiene los Permisos para acceder a esta seccion');

            if ($this->auth->user()->rol_Usuario == 'supervisor') {
                return redirect()->to('Supervisor');
            }elseif ($this->auth->user()->rol_Usuario == 'residente') {
                return redirect()->to('Residente');
            }elseif ($this->auth->user()->rol_Usuario == 'contador') {
                return redirect()->to('Contador');
            }

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $identificacion_Usuario)
    {
        $users = User::find($identificacion_Usuario);
        if (($users->foto != null) && ($request->foto != null)){
            \Storage::delete($users->foto);
        }
        $users->fill($request->all());
        try {
                $users->save();
          } catch(PDOException $e){
                Session::flash('message-error','El Usuario no pudo ser Actualizado Correctamente. Error: '.$e);
                return Redirect::to('/Usuarios');
         }

         Session::flash('message-sucess','Usuario Actualizado Correctamente');
        if($this->auth->user()->rol_Usuario != 'administrador'){

            if ($this->auth->user()->rol_Usuario == 'supervisor') {
                return redirect()->to('Supervisor');
            }elseif ($this->auth->user()->rol_Usuario == 'residente') {
                return redirect()->to('Residente');
            }elseif ($this->auth->user()->rol_Usuario == 'contador') {
                return redirect()->to('Contador');
            }
        }
        return Redirect::to('/Usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($identificacion_Usuario)
    {
        $users = User::find($identificacion_Usuario);
        
                $users->delete();
                //Session::flash('message-error','El Usuario no pudo ser Actualizado Correctamente. Error: '.$e->getMessage());
        if ($users->foto != null){
            \Storage::delete($users->foto);
        }        
        
        Session::flash('message-sucess','Usuario Eliminado Correctamente');
        return Redirect::to('/Usuarios');
    }

    public function deleteFile($id)
    {
    //    return $request['logo'];
        $users = User::find($id);
        if ($users->foto != null){
            DB::table('Usuarios')
                ->where('id', $id)
                ->update(['foto' => null]);
            \Storage::delete($users->foto);
        }
        return Redirect::to('/Usuarios/'.$id.'/edit');
    }
}

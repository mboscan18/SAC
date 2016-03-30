<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\User;

use Auth;
use Session;
use Redirect;

use SAC\Http\Requests;
use SAC\Http\Requests\LogRequest;
use SAC\Http\Controllers\Controller;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Log.login');
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
    public function store(LogRequest $request)
    {
       

        if(Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']])){
            
            $user = Auth::user();

            if($user->rol_Usuario == 'administrador'){
                return Redirect::to('Administrador');
            }elseif ($user->rol_Usuario == 'supervisor') {
                return Redirect::to('Supervisor');
            }elseif ($user->rol_Usuario == 'residente') {
                return Redirect::to('Residente');
            }elseif ($user->rol_Usuario == 'contador') {
                return Redirect::to('Contador');
            }
            
        }else{
            Session::flash('message-error','E-mail o Password incorrecto');
            return Redirect::to('/');
            //return Redirect::to('/');
        }
        
    }

    public function logout(){
        Auth::logout();
        return Redirect::to('/');
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
        //
    }
}

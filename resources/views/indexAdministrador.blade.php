@extends('layouts.principal')
@section('page-title','Administrador')

@section('titulo')  
    <h3 class="page-header"><i class="icon_key"></i>Administrador</h3>
@endsection
@section('lugar')
   <li><i class="icon_key"></i> Administrador</li>
@endsection
@section('accion')
@endsection

@section('content')
    @include('alerts.messages')
    <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="panel panel-primary">
                  <div class="panel-heading " style="background-color: #1a2732; color: #9cd5eb;">
                       Funciones de Usuario 
                  </div>
                  <div class="panel-body" >

                      

                      <div class="col-lg-12 col-md-12 col-sm-12">
                          <h4 class="">Usuario Administrador</h4>
                      </div>   
                      <div style="background-color: #688a7e; height: 16px" class="col-lg-12 col-md-12 col-sm-12"></div>
                      <div class="col-lg-12 col-md-12 col-sm-12"><br></div>


                      <div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12" style="text-align: center">
                          <div class="info-box blue-bg" style="text-align:center">
                            <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-left: -5%;  vertical-align: middle;">
                                <img alt="" src="{!!URL::asset('/img/icon_project_big.png')!!}" style="height: 85px;">
                            </div>
                            <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-8" style="margin-left: 4%">
                                <div class="count" >Pagos Pendientes</div>
                                <div class="title" >Ver Pagos todos los Pagos Pendientes</div> 
                            </div>
                          </div>
                          <a href="{!!URL::to('PagosPendientes')!!}"> 
                          <div class="botn " style="margin-top: -40px; width: 100%">
                              Ver Pagos todos los Pagos Pendientes
                          </div>
                          </a> 
                      </div>
                      
                     
                      <div class="col-lg-12 col-md-12 col-sm-12"></div>

                  </div>
              </div>

        </div>
                    
@endsection

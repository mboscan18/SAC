@extends('layouts.principal')
@section('page-title', 'Opciones del Proyecto')

@section('titulo')  
    <h3 class="page-header"><i class="icon_building"></i>Opciones del Proyecto:</h3>
@endsection
@section('lugar')
    <li><img alt="" src="{!!URL::asset('/img/icon_project_small.png')!!}" style="width: 15px"><a href="{!!URL::to('ProyectosUsuario/'.Auth::user()->id)!!}"> Proyectos</a></li>
    <li><i class="fa fa-gears"></i> Opciones del Proyecto</li>
@endsection
@section('accion')
@endsection

    @section('content')
        @include('alerts.messages')
        @include('alerts.errors')
        @include('alerts.warnings')
        <!-- page start-->
        <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="panel panel-primary">
                  <div class="panel-heading " style="background-color: #1a2732; color: #9cd5eb;">
                        
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            Opciones del Proyecto 
                        </div>
                        <a href="{!!URL::to('ProyectosUsuario/'.Auth::user()->id)!!}" >
                          <div class="col-lg-3 col-md-3 col-sm-12 fa fa-arrow-left" style="text-align: right; padding-top: 10px">
                             <span class="font">
                                Volver a Proyectos
                              </span>
                          </div>
                        </a> 
                      </div>
                  <div class="panel-body" >

                      <div id="Cabecera">
                          <div class="col-lg-10 col-md-10 col-sm-10">
                              <div class="col-lg-3 col-md-3 col-sm-3">
                                  <b class="tam-12-5">PROYECTO: </b>
                              </div>
                              <div class="col-lg-9 col-md-9 col-sm-9">
                                  <p class="tam-12-5">{{strtoupper($proyecto->nombre_Proyecto)}}</p>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-3" style="height: 28px;">
                                  <b class="tam-12-5">EMPRESA CLIENTE: </b>
                              </div>
                              <div class="col-lg-9 col-md-9 col-sm-9" style="height: 28px;">
                                <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center">
                                    <img src="{!!URL::asset('/archivos/'.$proyecto->empresa->logo)!!}" alt="" style="height: 25px;"/>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    {{$proyecto->empresa->nombre_Empresa}}
                                </div>
                              </div>
                          </div>
                      </div>  <!-- Fin Cabecera -->

                      <div class="col-lg-12 col-md-12 col-sm-12"><br><br></div>
                      <div class="col-lg-12 col-md-12 col-sm-12">
                          <h4 class="">Opciones del Contrato</h4>
                      </div>   
                      <div style="background-color: #688a7e; height: 16px" class="col-lg-12 col-md-12 col-sm-12"></div>
                      <div class="col-lg-12 col-md-12 col-sm-12"><br></div>


                      <div class=" col-lg-4 col-md-4 col-sm-12 col-xs-12" style="text-align: center">
                          <div class="info-box blue-bg" style="text-align:center">
                            <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-left: -5%;  vertical-align: middle;">
                                <img alt="" src="{!!URL::asset('/img/icon_project_big.png')!!}" style="height: 85px;">
                            </div>
                            <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-8" style="margin-left: 4%">
                                <div class="count" >Proyecto</div>
                                <div class="title" >Informacion del Proyecto</div> 
                            </div>
                          </div>
                          <a href="{!!URL::to('/Proyectos/'.$proyecto->id.'/edit')!!}"> 
                          <div class="botn " style="margin-top: -40px; width: 100%">
                              Ver informacion del Proyecto
                          </div>
                          </a> 
                      </div>
                      
                      <div class=" col-lg-4 col-md-4 col-sm-12 col-xs-12" style="text-align: center">
                          <div class="info-box blue-bg" style="text-align:center;  vertical-align: middle;">
                            <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-left: -5%;  vertical-align: middle;">
                                <img alt="" src="{!!URL::asset('/img/icon_contrato.png')!!}" style="height: 85px;">
                            </div>
                            <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-8" style="margin-left: 4%">
                                <div class="count" >Contratos</div>
                                <div class="title" >Contratos del Proyecto</div> 
                            </div>
                          </div>
                          <a href="{!!URL::to('/Contrato/'.$proyecto->id)!!}" > 
                          <div class="botn " style="margin-top: -40px; width: 100%">
                             Ver Contratos del Proyecto
                          </div>
                          </a> 
                      </div>


                      <div class=" col-lg-4 col-md-4 col-sm-12 col-xs-12" style="text-align:center">
                          <div class="info-box blue-bg">
                            <i class="fa fa-group"></i>
                            <div class="count">Admin</div>
                            <div class="title">Usuarios Administradores</div>           
                          </div>
                          <a href=""> 
                          <div class="botn " style="margin-top: -40px; width: 100%">
                              Ver Administradores del Proyecto
                          </div>
                          </a>       
                      </div>

                      <div class="col-lg-12 col-md-12 col-sm-12"></div>

                  </div>
              </div>

        </div>

 
<!-- Button trigger modal -->     

            <!-- page end-->

    
    @endsection

    @section('scripts')  
    @endsection
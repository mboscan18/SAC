@extends('layouts.principal')
  @section('page-title', 'Contratos - Crear')

@section('titulo')  
    <h3 class="page-header"><img alt="" src="{!!URL::asset('/img/icon_contrato.png')!!}" style="width: 39px"> Crear Contrato</h3>
@endsection
@section('lugar')
</li><li><img alt="" src="{!!URL::asset('/img/icon_project_small.png')!!}" style="width: 15px"><a href="{!!URL::to('ProyectosUsuario/'.Auth::user()->id)!!}"> Proyectos</a></li>
    <li><i class="fa fa-gears"></i> <a href="{!!URL::to('OpcionesProyecto/'.$proyecto->id)!!}"> Opciones del Proyecto</a></li>
   <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Contrato/'.$proyecto->id)!!}"> Contratos</a></li>
@endsection
@section('accion')
  <li><i class="fa fa-plus"></i> Crear Contrato</li>
@endsection

  @section('content')
      @include('alerts.request')
            <!-- page start-->
              <div class="col-lg-1"></div>
              <div class="col-lg-10 col-md-10 col-sm-10">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb">
                      
                      <div class="col-lg-9 col-md-9 col-sm-12">
                            Crear Contrato
                        </div>
                        <a href="{!!URL::to('/Contrato/'.$proyecto->id)!!}" >
                          <div class="col-lg-3 col-md-3 col-sm-12 fa fa-arrow-left" style="text-align: right; padding-top: 10px;">
                             <span class="font">
                                Volver a Contratos
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

                        <div class="col-lg-12 col-md-12 col-sm-12"><br></div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h4 class="">Crear Contrato</h4>
                        </div>   
                        <div style="background-color: #688a7e; height: 16px" class="col-lg-12 col-md-12 col-sm-12"></div>
                        <div class="col-lg-12 col-md-12 col-sm-12"><br></div> 
                      {!!Form::open(['route'=>'Contratos.store', 'method'=>'POST'])!!}
                          @include('Contratos.form.contratosCreate')
                          <div class="col-lg-3 col-md-3 col-sm-3"></div>
                          <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:center">
                              <button type="submit" class="boton" style="width:100%"><i class="icon_floppy"></i> Registrar</button>
                          </div>
                          <div class="col-lg-3 col-md-3 col-sm-3"></div>
                      {!!Form::close()!!}
                    </div>
                </div>
              </div> 
            <!-- page end-->
@endsection
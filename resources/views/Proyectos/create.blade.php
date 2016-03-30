@extends('layouts.principal')
  @section('page-title', 'Crear Proyectos')

@section('titulo')  
    <h3 class="page-header"><img alt="" src="{!!URL::asset('/img/icon_project_big.png')!!}" style="width: 35px"> Crear Proyecto</h3>
@endsection
@section('lugar')
    </li><li><img alt="" src="{!!URL::asset('/img/icon_project_small.png')!!}" style="width: 15px"><a href="{!!URL::to('ProyectosUsuario/'.Auth::user()->id)!!}"> Proyectos</a></li>
@endsection
@section('accion')
  <li><i class="fa fa-plus"></i> Crear Proyecto</li>
@endsection

  @section('content')
      @include('alerts.request')
            <!-- page start-->
              <div class="col-lg-1"></div>
              <div class="col-lg-10 col-md-10 col-sm-10">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb">
                      <div class="col-lg-9 col-md-9 col-sm-12">
                            Crear Proyecto 
                        </div>
                        <a href="{!!URL::to('ProyectosUsuario/'.Auth::user()->id)!!}" >
                          <div class="col-lg-3 col-md-3 col-sm-12 fa fa-arrow-left " style="text-align: right; padding-top: 10px;">
                              <span class="font">
                                Volver a Proyectos
                              </span>
                          </div>
                        </a> 
                    </div>
                    <div class="panel-body" >
                      {!!Form::open(['route'=>'Proyectos.store', 'method'=>'POST'])!!}
                          @include('Proyectos.form.proyectos')
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
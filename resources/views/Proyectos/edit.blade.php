@extends('layouts.principal')
  @section('page-title', 'Información del Proyecto')

@section('titulo')  
    <h3 class="page-header"><img alt="" src="{!!URL::asset('/img/icon_project_big.png')!!}" style="width: 35px"> Información del Proyecto</h3>
@endsection
@section('lugar')
   </li><li><img alt="" src="{!!URL::asset('/img/icon_project_small.png')!!}" style="width: 15px"><a href="{!!URL::to('ProyectosUsuario/'.Auth::user()->id)!!}"> Proyectos</a></li>
    <li><i class="fa fa-gears"></i> <a href="{!!URL::to('OpcionesProyecto/'.$proyectos->id)!!}"> Opciones del Proyecto</a></li>
@endsection
@section('accion')
  <li><i class="fa fa-plus"></i> Información del Proyecto</li>
@endsection

  @section('content')
      @include('alerts.request')
            <!-- page start-->
              <div class="col-lg-1"></div>
              <div class="col-lg-10 col-md-10 col-sm-10">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb">
                      <div class="col-lg-8 col-md-8 col-sm-12">
                            Información del Proyecto 
                        </div>
                        <a href="{!!URL::to('OpcionesProyecto/'.$proyectos->id)!!}" >
                          <div class="col-lg-4 col-md-4 col-sm-12 fa fa-arrow-left " style="text-align: right; padding-top: 10px;">
                             <span class="font">
                                Volver a Opciones del Proyecto
                              </span>
                          </div>
                        </a> 
                    </div>
                    <div class="panel-body" >
                      {!!Form::model($proyectos,['route'=>['Proyectos.update',$proyectos],'method'=>'PUT'])!!}
                          @include('Proyectos.form.proyectos')
                             <div class="col-lg-6 col-md-6 col-sm-6 ">
                              <button type="submit" class="boton" style="width:100%"><i class="icon_floppy"></i> Guardar</button>
                            </div>
                      {!!Form::close()!!}
                      <div class="col-lg-6 col-md-6 col-sm-6 ">
                      {!!Form::open(['route'=>['Proyectos.destroy', $proyectos], 'method' => 'DELETE'])!!}
                        <button type="submit" class="boton boton-danger" style="width:100%"><i class="fa fa-trash-o fa-lg"></i> Eliminar</button>
                      {!!Form::close()!!}
                    </div>
                </div>
              </div>
            <!-- page end-->
@endsection
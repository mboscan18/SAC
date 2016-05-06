@extends('layouts.principal')
  @section('page-title', 'Contactos Bancarios - Editar')

@section('titulo')  
    <h3 class="page-header"><i class="fa fa-credit-card"></i> Contactos Bancarios</h3>
@endsection
@section('lugar')
   <li><i class="fa fa-credit-card"></i><a href="{!!URL::to('/DatosBancarios')!!}"> Contactos Bancarios</a></li>
@endsection
@section('accion')
  <li><i class="fa fa-pencil"></i> Editar Contacto Bancario</li>
@endsection

  @section('content')
      @include('alerts.request')
      @include('alerts.errors')
            <!-- page start-->
              <div class="col-lg-1"></div>
              <div class="col-lg-10 col-md-10 col-sm-10">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb">
                      <div class="col-lg-9 col-md-9 col-sm-12">
                            Editar Contacto Bancario 
                        </div>
                        <a href="{!!URL::to('/DatosBancarios')!!}" >
                          <div class="col-lg-3 col-md-3 col-sm-12 fa fa-arrow-left " style="text-align: right; padding-top: 10px;">
                              <span class="font">
                                Volver a Contactos Bancarios
                              </span>
                          </div>
                        </a> 
                    </div>
                    <div class="panel-body" >
                      {!!Form::model($datos,['route'=>['DatosBancarios.update',$datos],'method'=>'PUT'])!!}
                          @include('DatosBancarios.form.datosbancariosEdit')
                             <div class="col-lg-6 col-md-6 col-sm-6 ">
                              <button type="submit" class="boton " style="width:100%"><i class="icon_floppy"></i> Guardar</button>
                            </div>
                      {!!Form::close()!!}
                      <div class="col-lg-6 col-md-6 col-sm-6 ">
                      {!!Form::open(['route'=>['DatosBancarios.destroy', $datos], 'method' => 'DELETE'])!!}
                        <button type="submit" class="boton boton-danger" style="width:100%"><i class="fa fa-trash-o fa-lg"></i> Eliminar</button>
                      {!!Form::close()!!}
                    </div>
                </div>
              </div>
            <!-- page end-->
@endsection
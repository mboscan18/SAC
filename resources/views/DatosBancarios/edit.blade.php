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
              <div class="col-lg-2"></div>
              <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">Datos de Contacto Bancario</div>
                    <div class="panel-body" >
                      {!!Form::model($datos,['route'=>['DatosBancarios.update',$datos],'method'=>'PUT'])!!}
                          @include('DatosBancarios.form.datosbancarios')
                             <div class="col-lg-6 col-md-6 col-sm-6 ">
                              <button type="submit" class="btn btn-info" style="width:100%"><i class="icon_floppy"></i> Guardar</button>
                            </div>
                      {!!Form::close()!!}
                      <div class="col-lg-6 col-md-6 col-sm-6 ">
                      {!!Form::open(['route'=>['DatosBancarios.destroy', $datos], 'method' => 'DELETE'])!!}
                        <button type="submit" class="btn btn-danger" style="width:100%"><i class="fa fa-trash-o fa-lg"></i> Eliminar</button>
                      {!!Form::close()!!}
                    </div>
                </div>
              </div>
            <!-- page end-->
@endsection
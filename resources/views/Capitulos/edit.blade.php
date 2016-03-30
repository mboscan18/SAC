@extends('layouts.principal')
  @section('page-title', 'Capitulos - Editar')

@section('titulo')  
    <h3 class="page-header"><i class="icon_documents"></i> Capitulos</h3>
@endsection
@section('lugar')
   <li><i class="icon_documents"></i><a href="{!!URL::to('/Capitulos')!!}">Capitulos</a></li>
@endsection
@section('accion')
   <li><i class="fa fa-plus"></i> Editar Capitulo</li>
@endsection

  @section('content')
      @include('alerts.request')
            <!-- page start-->
              <div class="col-lg-2"></div>
              <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">Datos del Capitulo</div>
                    <div class="panel-body" >
                      {!!Form::model($capitulo,['route'=>['Capitulos.update',$capitulo],'method'=>'PUT'])!!}
                          @include('Capitulos.form.capitulos')
                             <div class="col-lg-6 col-md-6 col-sm-6 ">
                              <button type="submit" class="btn btn-info" style="width:100%"><i class="icon_floppy"></i> Guardar</button>
                            </div>
                      {!!Form::close()!!}
                      <div class="col-lg-6 col-md-6 col-sm-6 ">
                      {!!Form::open(['route'=>['Capitulos.destroy', $capitulo], 'method' => 'DELETE'])!!}
                        <button type="submit" class="btn btn-danger" style="width:100%"><i class="fa fa-trash-o fa-lg"></i> Eliminar</button>
                      {!!Form::close()!!}
                    </div>
                </div>
              </div>
            <!-- page end-->
@endsection
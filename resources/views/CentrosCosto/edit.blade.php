@extends('layouts.principal')
@section('page-title', 'Centros de Costo')

@section('titulo')  
    <h3 class="page-header"><i class="icon_documents"></i>Centros de Costo</h3>
@endsection
@section('lugar')
   <li><i class="icon_documents"></i><a href="{!!URL::to('/CentrosCosto')!!}">Centros de Costo</a></li>
@endsection
@section('accion')
  <li><i class="fa fa-pencil"></i> Editar Centro de Costo</li>
@endsection

    @section('content')
              @include('alerts.request')

            <!-- page start-->
              <div class="col-lg-2 col-md-2 col-sm-2"></div>
              <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">Datos de Centro de Costo</div>
                    <div class="panel-body" >
                      
                      {!!Form::model($cc,['route'=>['CentrosCosto.update',$cc],'method'=>'PUT'])!!}
                          @include('CentrosCosto.form.cc')
                          	 <div class="col-lg-6 col-md-6 col-sm-6 ">
                              <button type="submit" class="btn btn-info" style="width:100%"><i class="icon_floppy"></i> Guardar</button>
                            </div>
                      {!!Form::close()!!}
                      <div class="col-lg-6 col-md-6 col-sm-6 ">
                      {!!Form::open(['route'=>['CentrosCosto.destroy', $cc], 'method' => 'DELETE'])!!}
                        <button type="submit" class="btn btn-danger" style="width:100%"><i class="fa fa-trash-o fa-lg"></i> Eliminar</button>
                      {!!Form::close()!!}
                    </div>
                    </div>
                </div>
              </div>
            <!-- page end-->
    @endsection

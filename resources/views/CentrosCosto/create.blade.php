@extends('layouts.principal')
  @section('page-title', 'Centros de Costo')

@section('titulo')  
    <h3 class="page-header"><i class="icon_documents"></i> Centros de Costo</h3>
@endsection
@section('lugar')
   <li><i class="icon_documents"></i><a href="{!!URL::to('/CentrosCosto')!!}">Centros de Costo</a></li>
@endsection
@section('accion')
  <li><i class="fa fa-plus"></i> Crear Centro de Costo</li>
@endsection

  @section('content')
      @include('alerts.request')
            <!-- page start-->
              <div class="col-lg-2"></div>
              <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">Ingrese los datos del nuevo Centro de Costo</div>
                    <div class="panel-body" >
                      {!!Form::open(['route'=>'CentrosCosto.store', 'method'=>'POST'])!!}
                          @include('CentrosCosto.form.cc')
                          <div class="col-lg-3 col-md-3 col-sm-3"></div>
                          <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:center">
                              <button type="submit" class="btn btn-info" style="width:100%"><i class="icon_floppy"></i> Registrar</button>
                          </div>
                          <div class="col-lg-3 col-md-3 col-sm-3"></div>
                      {!!Form::close()!!}
                    </div>
                </div>
              </div>
            <!-- page end-->
@endsection
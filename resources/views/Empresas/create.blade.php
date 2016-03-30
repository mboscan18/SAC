@extends('layouts.principal')
@section('page-title', 'Empresas - Crear')

@section('titulo')  
    <h3 class="page-header"><i class="icon_building"></i>Empresas</h3>
@endsection
@section('lugar')
   <li><i class="icon_building"></i><a href="{!!URL::to('/Empresas')!!}">Empresas</a></li>
@endsection
@section('accion')
    <li><i class="fa fa-plus"></i>Crear Empresa</li>
@endsection

  @section('content')
                @include('alerts.request')
            <!-- page start-->
              <div class="col-lg-2"></div>
              <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">Ingrese los datos de la nueva Empresa</div>
                    <div class="panel-body" >
                      {!!Form::open(['route'=>'Empresas.store', 'method'=>'POST','files' => true])!!}
                          @include('Empresas.form.empresas')
                          <div class="col-lg-6" style="text-align: right">
                            {!!Form::label('foto','Logo de la Empresa (Opcional):')!!}
                          </div>
                          <div class="col-lg-6">
                            {!!Form::file('logo',['accept' => 'image/*'])!!}
                          </div>
                        </div>
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
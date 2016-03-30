@extends('layouts.principal')
@section('page-title', 'Usuarios - Crear')

@section('titulo')  
    <h3 class="page-header"><i class="icon_group"></i>Usuarios</h3>
@endsection
@section('lugar')
   <li><i class="icon_group"></i><a href="{!!URL::to('/Usuarios')!!}">Usuarios</a></li>
@endsection
@section('accion')
    <li><i class="fa fa-plus"></i>Crear Usuario</li>
@endsection

  @section('content')
                @include('alerts.request')
            <!-- page start-->
              <div class="col-lg-2"></div>
              <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">Ingrese los datos del nuevo usuario</div>
                    <div class="panel-body" >
                      {!!Form::open(['route'=>'Usuarios.store', 'method'=>'POST','files' => true])!!}
                          @include('Usuarios.form.users')
                          <div class="col-lg-6" style="text-align: right">
                            {!!Form::label('foto','Foto de Usuario (Opcional):')!!}
                          </div>
                          <div class="col-lg-6">
                            {!!Form::file('foto',['accept' => 'image/*'])!!}
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
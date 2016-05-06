@extends('layouts.principal')
@section('page-title', 'Tipos de Cuenta')

@section('titulo')  
    <h3 class="page-header"><i class="icon_building"></i>Tipos de Cuenta</h3>
@endsection
@section('lugar')
   <li><i class="icon_building"></i><a href="{!!URL::to('/TiposCuenta')!!}">Tipos de Cuenta</a></li>
@endsection
@section('accion')
    <li><i class="fa fa-pencil"></i>Editar Tipo de Cuenta</li>
@endsection

  @section('content')
              @include('alerts.request')
      @include('alerts.errors')

            <!-- page start-->
            <div class="col-lg-1 col-md-1 col-sm-1"></div>
              <div class="col-lg-10 col-md-10 col-sm-10">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb">
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            Editar Tipo de Cuenta 
                        </div>
                        <a href="{!!URL::to('TiposCuenta/')!!}" >
                          <div class="col-lg-3 col-md-3 col-sm-12 fa fa-arrow-left " style="text-align: right; padding-top: 10px;">
                              <span class="font">
                                Volver a Tipos de Cuenta
                              </span>
                          </div>
                        </a> 
                    </div>
                    <div class="panel-body" >
                      {!!Form::model($tipoCuenta,['route'=>['TiposCuenta.update',$tipoCuenta],'method'=>'PUT','files' => true])!!}
                          @include('TiposCuenta.form.tiposCuenta')
                          
                          </div>
                             <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:right">
                              <button type="submit" class="boton" style="width:100%"><i class="icon_floppy"></i> Guardar</button>
                            </div>
                      {!!Form::close()!!}
                      <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:left">

                          {!!Form::open(['route'=>['TiposCuenta.destroy', $tipoCuenta], 'method' => 'DELETE'])!!}
                            <button type="submit" class="boton boton-danger" style="width:100%"><i class="fa fa-trash-o fa-lg"></i> Eliminar</button>
                            {!!Form::close()!!}
                      </div>
                    </div>
                </div>
              </div>
            <!-- page end-->
  
    
  @endsection
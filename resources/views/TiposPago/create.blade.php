@extends('layouts.principal')
@section('page-title', 'Tipos de Pago')

@section('titulo')  
    <h3 class="page-header"><i class="icon_building"></i>Tipos de Pago</h3>
@endsection
@section('lugar')
   <li><i class="icon_building"></i><a href="{!!URL::to('/TiposPago')!!}">Tipos de Pago</a></li>
@endsection
@section('accion')
    <li><i class="fa fa-plus"></i>Crear Tipo de Pago</li>
@endsection

  @section('content')
                @include('alerts.request')
            <!-- page start-->
            <div class="col-lg-1"></div>
              <div class="col-lg-10 col-md-10 col-sm-10">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb">
                      <div class="col-lg-9 col-md-9 col-sm-12">
                            Crear Tipo de Pago 
                        </div>
                        <a href="{!!URL::to('/TiposPago')!!}" >
                          <div class="col-lg-3 col-md-3 col-sm-12 fa fa-arrow-left " style="text-align: right; padding-top: 10px;">
                              <span class="font">
                                Volver a Tipos de Pago
                              </span>
                          </div>
                        </a> 
                    </div>
                    <div class="panel-body" >
                      {!!Form::open(['route'=>'TiposPago.store', 'method'=>'POST','files' => true])!!}
                          @include('TiposPago.form.tiposPago')
                        
                          </div>
                          
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
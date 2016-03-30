@extends('layouts.principal')
@section('page-title', 'Editar Retencion')

@section('titulo')  
    <h3 class="page-header"><i class="icon_building"></i>Editar Retencion</h3>
@endsection
@section('lugar')
   <li><i class="icon_building"></i><a href="{!!URL::to('/Retenciones')!!}">Retenciones</a></li>
@endsection
@section('accion')
    <li><i class="fa fa-pencil"></i>Editar Retencion</li>
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
                            Crear Retencion 
                        </div>
                        <a href="{!!URL::to('Retenciones/')!!}" >
                          <div class="col-lg-3 col-md-3 col-sm-12 fa fa-arrow-left " style="text-align: right; padding-top: 10px;">
                              <span class="font">
                                Volver a Retenciones
                              </span>
                          </div>
                        </a> 
                    </div>
                    <div class="panel-body" >
                      {!!Form::model($retencion,['route'=>['Retenciones.update',$retencion],'method'=>'PUT','files' => true])!!}
                          @include('Retenciones.form.retencion')
                          
                          </div>
                          	 <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:right">
                              <button type="submit" class="boton" style="width:100%"><i class="icon_floppy"></i> Guardar</button>
                          	</div>
                      {!!Form::close()!!}
                      <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:left">

                          {!!Form::open(['route'=>['Retenciones.destroy', $retencion], 'method' => 'DELETE'])!!}
                						<button type="submit" class="boton boton-danger" style="width:100%"><i class="fa fa-trash-o fa-lg"></i> Eliminar</button>
                            {!!Form::close()!!}
            					</div>
                    </div>
                </div>
              </div>
            <!-- page end-->
	
		
	@endsection
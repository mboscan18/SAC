@extends('layouts.principal')
  @section('page-title', 'Proyectos')
 
@section('titulo')  
    <h3 class="page-header"><img alt="" src="{!!URL::asset('/img/icon_project_big.png')!!}" style="width: 35px"> Proyectos</h3>
@endsection
@section('lugar')
   <li><img alt="" src="{!!URL::asset('/img/icon_project_small.png')!!}" style="width: 15px"> Proyectos</li>
@endsection
@section('accion')
@endsection

  @section('content')
        @include('alerts.messages')

        <div class="col-lg-1 col-md-1 col-sm-1" style="text-align: center;">
          	<div class="icon-reorder tooltips col-lg-1 col-md-1 col-sm-1" data-original-title="Crear Proyecto" data-placement="bottom" style="height: 45px; width: 30%">
	      		<a href="{!!URL::to('Proyectos/create')!!}" class="" style="text-align: right; ">
					<img alt="" src="{!!URL::asset('/img/icon_add.png')!!}" style="height: 45px; width: 45px">
	            </a>
            </div>	
          </div>
          @if(Auth::user()->rol_Usuario == 'administrador')
	          <div class="col-lg-10 col-md-10 col-sm-10"> </div>
	          	<div class="icon-reorder tooltips col-lg-1 col-md-1 col-sm-1" data-original-title="Mostrar Proyectos Eliminados" data-placement="bottom" style="height: 45px; text-align: right">
		      		<a href="{!!URL::to('ProyectosDeleted')!!}" class="" style="text-align: right; ">
						<img alt="" src="{!!URL::asset('/img/icon_datosEliminados.png')!!}" style="height: 45px; width: 45px">
		            </a>
		        </div>	
		  @endif 
          <br><br><br>
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading " style="background-color: #1a2732; color: #9cd5eb">Proyectos</div>
                <div class="panel-body" >
	              		<div class="datoBancario">
							<table class="table" id="tabla_Proyectos">
					      		<thead>
					      			<th>Cod Proyecto</th>
							        <th>Titulo de Proyecto</th>
							        <th>Ubicacion Proyecto</th>
							        <th>Empresa Cliente</th>
							        <th>Estado</th>
							        @if(Auth::user()->rol_Usuario == 'administrador')
						        		<th>Ultima Modificacion</th>
						        	@endif	
							        @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente') || (Auth::user()->rol_Usuario == 'supervisor'))
							        	<th>Operacion</th>
							        @endif	
						      	</thead>
						      @foreach($proyectos as $datos)
						        <tbody>
						          <td>{{$datos->cod_Proyecto}}</td>
						          <td>{{$datos->nombre_Proyecto}}</td>
						          <td>{{$datos->ubicacion_Proyecto}}</td>
						          <td>{{$datos->empresa->nombre_Empresa}}</td>
						          <td>{{$datos->estado_Proyecto}}</td>
						          @if(Auth::user()->rol_Usuario == 'administrador')
							          <td>
							          	{{$datos->user->nombre_Usuario}} {{$datos->user->apellido_Usuario}} | {{$datos->updated_at->format('d-m-Y, g:ia')}}
							          </td>
							      @endif   
					            	@if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente') || (Auth::user()->rol_Usuario == 'supervisor') )
						          		<td class=" col-lg-1" style="text-align: center">
											<div  style="; text-align: center">
												<a class="btn btn-primary" href="{!!URL::to('/OpcionesProyecto/'.$datos->id)!!}" class="" style="text-align: center;">
						                        	Ver Opciones
						                    	</a>
						                    </div>
									  	</td>
								  	@endif
						        </tbody>
						      @endforeach
						    </table>
						</div>
                </div>
            </div>
          </div>
            <!-- page start-->
              
            <!-- page end-->
	@endsection
	@section('scripts')
		{!!Html::script('js/script3.js')!!}
	@endsection
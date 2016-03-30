@extends('layouts.principal')
@section('page-title', 'Firmantes')

@section('titulo')  
    <h3 class="page-header"><i class="icon_building"></i>Firmantes</h3>
@endsection
@section('lugar')
   <li><i class="icon_building"></i> Firmantes</li>
@endsection
@section('accion')
@endsection

	@section('content')
	    @include('alerts.messages')
	    @include('alerts.errors')

	      	<?php
	        	Session::put('origen',1);
	        ?>	
	    <!-- page start-->
	    <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center;">
          	<div class="icon-reorder tooltips col-lg-1 col-md-1 col-sm-1" data-original-title="Crear Firmante" data-placement="bottom" style="height: 45px; width: 30%">
	      		<a href="{!!URL::to('Firmantes/create')!!}" class="" style="text-align: right; ">
					<img alt="" src="{!!URL::asset('/img/icon_add.png')!!}" style="height: 45px; width: 45px">
	            </a>
            </div>	
          </div>
          @if(Auth::user()->rol_Usuario == 'administrador')
	          <div class="col-lg-8 col-md-8 col-sm-8"> </div>
	          	<div class="icon-reorder tooltips col-lg-1 col-md-1 col-sm-1" data-original-title="Mostrar Firmantes Eliminados" data-placement="bottom" style="height: 45px; text-align: right">
		      		<a href="{!!URL::to('EmpresasDeleted')!!}" class="" style="text-align: right; ">
						<img alt="" src="{!!URL::asset('/img/icon_datosEliminados.png')!!}" style="height: 45px; width: 45px">
		            </a>
		        </div>	
		  @endif      
          <br><br><br>
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading " style="background-color: #1a2732; color: #9cd5eb">
                	Firmantes
                </div>
                <div class="panel-body" >
		              <div class="empresas">
						<table class="table" id="table_empresas" class="display">
						      <thead>
						        <th>Nombre</th>
						        <th>Apellido</th>
						        <th>Cargo</th>
						        @if(Auth::user()->rol_Usuario == 'administrador')
						        	<th>Ultima Modificacion</th>
						        @endif		
						        @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
						        	<th>Operacion</th>
						        @endif	
						      </thead>
						        <tbody>
						      @foreach($firmantes as $datos)
						      <tr>
						          <td>{{$datos->nombre}}</td>
						          <td>{{$datos->apellido}}</td>
						          <td>{{$datos->cargo}}</td>
						          @if(Auth::user()->rol_Usuario == 'administrador')
							          <td>
							          	{{$datos->user->nombre_Usuario}} {{$datos->user->apellido_Usuario}} | {{$datos->updated_at->format('d-m-Y, g:ia')}}
							          </td>
							      @endif    
						          @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
							          <td  style="text-align: center">
										<div class="icon-reorder tooltips" data-original-title="Editar" data-placement="right" style="; text-align: center">
											<a href="{!!URL::to('/Firmantes/'.$datos->id.'/edit')!!}" class="" style="text-align: center;">
					                        	<img alt="" src="{!!URL::asset('/img/icon_edit.png')!!}" style="height: 30px; width: 30px">
					                    	</a>
					                    </div>
									  </td>
								  @endif	
							  </tr>	  
						      @endforeach
					    	</tbody>
					    </table>
					</div>
                </div>
            </div>
          </div>

            <!-- page end-->
	
	@endsection
	@section('scripts')
	@endsection
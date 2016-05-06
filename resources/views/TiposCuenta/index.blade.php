@extends('layouts.principal')
@section('page-title', 'Tipos de Cuenta')

@section('titulo')  
    <h3 class="page-header"><i class="icon_building"></i>Tipos de Cuenta</h3>
@endsection
@section('lugar')
   <li><i class="icon_building"></i> Tipos de Cuenta</li>
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
	    
		  <div class="col-lg-1 col-md-1 col-sm-1"><br></div>
          <div class="col-lg-10 col-md-10 col-sm-10">
            <div class="panel panel-primary">
                <div class="panel-heading " style="background-color: #1a2732; color: #9cd5eb">
                	Tipos de Cuenta
                </div>
                <div class="panel-body" >
		              <div class="empresas">
		              	<div class="col-lg-12 col-md-12 col-sm-12"><br></div>
                      <div class="col-lg-9 col-md-9 col-sm-9">
                          <h4 class="">Tipos de Cuenta</h4>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3" style="padding-bottom: 10px">
                          <a  href="{!!URL::to('/TiposCuenta/create')!!}">
	                      	<div class="boton tam-13" style="width: 100%; heigth: 80%; text-align: center">
	                            Agregar Tipo de Cuenta
	                      	</div>
                          </a>
                      </div> 
                      <div style="background-color: #688a7e; height: 16px" class="col-lg-12 col-md-12 col-sm-12"></div>
                      <div class="col-lg-12 col-md-12 col-sm-12"><br></div>
						<table class="table" id="table_empresas" class="display">
						      <thead>
						      	<tr>
							        <th>Descripción</th>
							        @if(Auth::user()->rol_Usuario == 'administrador')
							        	<th>Ultima Modificacion</th>
							        @endif		
							        @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
							        	<th>Operacion</th>
							        @endif	
						      	</tr>
						      </thead>
						        <tbody>
						      @foreach($tiposCuenta as $datos)
						      <tr>
						        <td>{{$datos->descripcion}}</td>
					          	@if(Auth::user()->rol_Usuario == 'administrador')
						          <td>
						          	{{$datos->user->nombre_Usuario}} {{$datos->user->apellido_Usuario}} | {{$datos->updated_at->format('d-m-Y, g:ia')}}
						          </td>
						     	@endif    
						          @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
							          <td  style="text-align: center">
										<div class="icon-reorder tooltips" data-original-title="Editar" data-placement="right" style="; text-align: center">
											<a href="{!!URL::to('/TiposCuenta/'.$datos->id.'/edit')!!}" class="" style="text-align: center;">
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
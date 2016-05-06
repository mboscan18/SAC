@extends('layouts.principal')
@section('page-title', 'Bancos')

@section('titulo')  
    <h3 class="page-header"><i class="icon_building"></i>Bancos</h3>
@endsection
@section('lugar')
   <li><i class="icon_building"></i> Bancos</li>
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
                	Bancos
                </div>
                <div class="panel-body" >
		              <div class="empresas">
		              	<div class="col-lg-12 col-md-12 col-sm-12"><br></div>
                      <div class="col-lg-10 col-md-10 col-sm-10">
                          <h4 class="">Bancos</h4>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-2" style="padding-bottom: 10px">
                          <a  href="{!!URL::to('/Bancos/create')!!}">
	                      	<div class="boton tam-13" style="width: 100%; heigth: 80%; text-align: center">
	                            Agregar Banco
	                      	</div>
                          </a>
                      </div> 
                      <div style="background-color: #688a7e; height: 16px" class="col-lg-12 col-md-12 col-sm-12"></div>
                      <div class="col-lg-12 col-md-12 col-sm-12"><br></div>
						<table class="table" id="table_empresas" class="display">
						      <thead>
						      	<tr>
							        <th>Logo</th>
							        <th>Nombre del Banco</th>
							        @if(Auth::user()->rol_Usuario == 'administrador')
							        	<th>Ultima Modificacion</th>
							        @endif		
							        @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
							        	<th>Operacion</th>
							        @endif	
						      	</tr>
						      </thead>
						        <tbody>
						      @foreach($bancos as $datos)
						      <tr>
					      		<td>
					      			@if($datos->logo == null)
						          		<img src="img/no_empresa.png" alt="" style="width:50px;"/>
						          	@else
						          		<img src="archivos/{{$datos->logo}}" alt="" style="width:50px;"/>
						          	@endif	
					      		</td>
						        <td>{{$datos->nombreBanco}}</td>
					          	@if(Auth::user()->rol_Usuario == 'administrador')
						          <td>
						          	{{$datos->user->nombre_Usuario}} {{$datos->user->apellido_Usuario}} | {{$datos->updated_at->format('d-m-Y, g:ia')}}
						          </td>
						     	@endif    
						          @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
							          <td  style="text-align: center">
										<div class="icon-reorder tooltips" data-original-title="Editar" data-placement="right" style="; text-align: center">
											<a href="{!!URL::to('/Bancos/'.$datos->id.'/edit')!!}" class="" style="text-align: center;">
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
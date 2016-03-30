@extends('layouts.principal')
  @section('page-title', 'Contratos')

@section('titulo')  
    <h3 class="page-header"><img alt="" src="{!!URL::asset('/img/icon_contrato.png')!!}" style="width: 39px"> Contratos</h3>
@endsection
@section('lugar')
   </li><li><img alt="" src="{!!URL::asset('/img/icon_project_small.png')!!}" style="width: 15px"><a href="{!!URL::to('ProyectosUsuario/'.Auth::user()->id)!!}"> Proyectos</a></li>
    <li><i class="fa fa-gears"></i> <a href="{!!URL::to('OpcionesProyecto/'.$proyecto->id)!!}"> Opciones del Proyecto</a></li>
   <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"> Contratos </li>
@endsection
@section('accion')
@endsection

  @section('content')
        @include('alerts.messages')
        @include('alerts.errors')
        <?php
        	Session::put('proyecto',$proyecto);
        ?>	

        <div class="col-lg-1 col-md-1 col-sm-1" style="text-align: center;">
          	<div class="icon-reorder tooltips col-lg-1 col-md-1 col-sm-1" data-original-title="Crear Contrato" data-placement="bottom" style="height: 45px; width: 30%">
	      		<a href="{!!URL::to('Contratos/create')!!}" class="" style="text-align: right; ">
					<img alt="" src="{!!URL::asset('/img/icon_add.png')!!}" style="height: 45px; width: 45px">
	            </a>
            </div>	
          </div>
          @if(Auth::user()->rol_Usuario == 'administrador')
	          <div class="col-lg-10 col-md-10 col-sm-10"> </div>
        		<div class="col-lg-1 col-md-1 col-sm-1" style="text-align: center;">
		          	<div class="icon-reorder tooltips col-lg-1 col-md-1 col-sm-1" data-original-title="Mostrar Proyectos Eliminados" data-placement="bottom" style="height: 45px; text-align: right">
			      		<a href="{!!URL::to('ContratosDeleted')!!}" class="" style="text-align: right; ">
							<img alt="" src="{!!URL::asset('/img/icon_datosEliminados.png')!!}" style="height: 45px; width: 45px">
			            </a>
			        </div>	
          		</div>
		  @endif 
          <br><br><br>
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading " style="background-color: #1a2732; color: #9cd5eb">
                	
                	<div class="col-lg-9 col-md-9 col-sm-12">
                            Contratos 
                        </div>
                        <a href="{!!URL::to('OpcionesProyecto/'.$proyecto->id)!!}" >
                          <div class="col-lg-3 col-md-3 col-sm-12 fa fa-arrow-left" style="text-align: right; padding-top: 10px;">
                             <span class="font">
                                Volver a Opciones del Proyecto
                              </span>
                          </div>
                        </a>
                </div>
                <div class="panel-body" >
	              		<div class="datoBancario">
							<div id="Cabecera">
	                          <div class="col-lg-10 col-md-10 col-sm-10">
	                              <div class="col-lg-3 col-md-3 col-sm-3">
	                                  <b class="tam-12-5">PROYECTO: </b>
	                              </div>
	                              <div class="col-lg-9 col-md-9 col-sm-9">
	                                  <p class="tam-12-5">{{strtoupper($proyecto->nombre_Proyecto)}}</p>
	                              </div>
	                              <div class="col-lg-3 col-md-3 col-sm-3" style="height: 28px;">
	                                  <b class="tam-12-5">EMPRESA CLIENTE: </b>
	                              </div>
	                              <div class="col-lg-9 col-md-9 col-sm-9" style="height: 28px;">
	                                <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center">
	                                    <img src="{!!URL::asset('/archivos/'.$proyecto->empresa->logo)!!}" alt="" style="height: 25px;"/>
	                                </div>
	                                <div class="col-lg-10 col-md-10 col-sm-10">
	                                    {{$proyecto->empresa->nombre_Empresa}}
	                                </div>
	                              </div>
	                          </div>
	                      </div>  <!-- Fin Cabecera -->

	                      <div class="col-lg-12 col-md-12 col-sm-12"><br></div>
	                      <div class="col-lg-12 col-md-12 col-sm-12">
	                          <h4 class="">Contratos</h4>
	                      </div>   
	                      <div style="background-color: #688a7e; height: 16px" class="col-lg-12 col-md-12 col-sm-12"></div>
	                      <div class="col-lg-12 col-md-12 col-sm-12"><br></div>	

							<table class="table" id="table_contrato" class="display">
					      		<thead>
					      			<th>Nro de Contrato</th>
							        <th>Periodo de Contrato</th>
							        <th>Fecha de Firma</th>
							        <th>Empresa Proveedor</th>
							        @if(Auth::user()->rol_Usuario == 'administrador')
						        		<th>Ultima Modificacion</th>
						        	@endif	
							        @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
							        	<th>Operaciones</th>
							        @endif	
						      	</thead>
						      	<tbody>
						      		<?php $i = 0 ?>
						      @foreach($contratos as $datos)
						        <tr >
						          <td>{{$datos->nro_Contrato}}</td>
						          <td>{{$datos->fecha_inicio}} - {{$datos->fecha_fin}}</td>
						          <td>{{$datos->fecha_firma}}</td>
						          <td>{{$datos->empresaProveedor->nombre_Empresa}}</td>
						          @if(Auth::user()->rol_Usuario == 'administrador')
							          <td>
							          	{{$datos->user->nombre_Usuario}} {{$datos->user->apellido_Usuario}} | {{$datos->updated_at->format('d-m-Y, g:ia')}}
							          </td>
							      @endif   
					            	@if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
							          <td class=" col-lg-1" style="text-align: center">
											<div  style="; text-align: center">
												<a class="btn btn-primary" href="{!!URL::to('/OpcionesContrato/'.$datos->id)!!}" class="" style="text-align: center;">
						                        	Ver Opciones
						                    	</a>
						                    </div>
									  </td>
								  	@endif
						        </tr>
						       	
						      <?php $i++ ?>
						      @endforeach
						      </tbody>
						    </table>
						</div>
                </div>
            </div>
          </div>
            <!-- page start-->
              
            <!-- page end-->
            
	@endsection

	
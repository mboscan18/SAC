@extends('layouts.principal')
  @section('page-title', 'Boletines')
 
@section('titulo')  
    <h3 class="page-header"><img alt="" src="{!!URL::asset('/img/icon_project_big.png')!!}" style="width: 35px"> Boletines</h3>
@endsection
@section('lugar')
   <li><img alt="" src="{!!URL::asset('/img/icon_project_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Pagos')!!}">Proyectos</a></li>
   <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/PagosProyecto/'.$contrato->proyecto->id)!!}">Contratos</a></li>
   <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"> Boletines</li>
@endsection
@section('accion')
@endsection

  @section('content')
        @include('alerts.messages')

          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-primary">
            	<div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb">
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            Boletines
                        </div>
                        <a href="{!!URL::to('/PagosProyecto/'.$contrato->proyecto->id)!!}" >
                          <div class="col-lg-3 col-md-3 col-sm-12 fa fa-arrow-left" style="text-align: right; padding-top: 10px;">
                             <span class="font">
                                Volver a Contratos
                              </span>
                          </div>
                        </a>
                    </div>
                <div class="panel-body" >
	              		<div class="datoBancario">
							<table class="table" id="tabla_Proyectos">
					      		<thead>
					      			<th>Nro Boletín</th>
							        <th>Nro Valuación</th>
							        <th>Fecha Inicio</th>
							        <th>Fecha Fin</th>
							        <th>Enviado a Pagar</th>
							        <th>Pagado</th>
							        <th>Faltante por Pagar</th>
							        @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'contador') || (Auth::user()->rol_Usuario == 'supervisor'))
							        	<th>Operacion</th>
							        @endif	
						      	</thead>
						        <tbody>
						      @foreach($resumenValuaciones as $datos)
							      <tr>
							          <td>{{$datos->nro_Boletin}}</td>
							          <td>{{$datos->nro_Valuacion}}</td>
							          <td>{{date('d-m-Y', strtotime($datos->periodo_inicio))}}</td>
							          <td>{{date('d-m-Y', strtotime($datos->periodo_fin))}}</td>
							          <td>{{number_format($datos->neto_Pagar, 2, ',','.')}}</td>
							          <td>{{number_format($datos->monto_pagado, 2, ',','.')}}</td>
							          <td>{{number_format($datos->diferencia_pago, 2, ',','.')}}</td>
						            	@if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'contador') || (Auth::user()->rol_Usuario == 'supervisor'))
							          		<td class=" col-lg-1" style="text-align: center">
												<div  style="; text-align: center">
							                        	<div class="icon-reorder tooltips" data-original-title="Ver Opciones" data-placement="bottom"  >
													<a class="btn btn-primary" href="{!!URL::to('/PagosBoletin/'.$datos->id)!!}" style="text-align: center; ">
							                        		<i class="fa fa-gears"></i>
							                    	</a>
							                        	</div>
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
            <!-- page start-->
              
            <!-- page end-->
	@endsection
	@section('scripts')
	@endsection
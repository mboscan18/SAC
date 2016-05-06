@extends('layouts.principal')
  @section('page-title', 'Contratos')
 
@section('titulo')  
    <h3 class="page-header"><img alt="" src="{!!URL::asset('/img/icon_project_big.png')!!}" style="width: 35px"> Contratos</h3>
@endsection
@section('lugar')
   <li><img alt="" src="{!!URL::asset('/img/icon_project_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Pagos')!!}">Proyectos</a></li>
   <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"> Contratos</li>
@endsection
@section('accion')
@endsection

  @section('content')
        @include('alerts.messages')

          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-primary">
            	<div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb">
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            Contratos
                        </div>
                        <a href="{!!URL::to('/Pagos')!!}" >
                          <div class="col-lg-3 col-md-3 col-sm-12 fa fa-arrow-left" style="text-align: right; padding-top: 10px;">
                             <span class="font">
                                Volver a Proyectos
                              </span>
                          </div>
                        </a>
                    </div>
                <div class="panel-body" >
	              		<div class="datoBancario">
							<table class="table" id="tabla_Proyectos">
					      		<thead>
					      			<th>Cod Proyecto</th>
							        <th>Titulo de Proyecto</th>
							        <th>Valor del Proyecto</th>
							        <th>Monto a Pagar</th>
							        <th>Enviado a Pagar</th>
							        <th>Faltante por Enviar a Pagar</th>
							        <th>Pagado</th>
							        <th>Faltante por Pagar</th>
							        @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
							        	<th>Operacion</th>
							        @endif	
						      	</thead>
						        <tbody>
						      @foreach($resumenProyecto as $datos)
							      <tr>
							          <td>{{$datos->nro_contrato}}</td>
							          <td>{{$datos->nombre_contratista}}</td>
							          <td>{{$datos->descripcion_Contrato}}</td>
							          <td>{{number_format($datos->valor_Contrato, 2, ',','.')}}</td>
							          <td>{{number_format($datos->monto_Pagar_Contrato, 2, ',','.')}}</td>
							          <td>{{number_format($datos->enviado_Pagar_Contrato, 2, ',','.')}}</td>
							          <td>{{number_format($datos->faltante_Enviar_Pagar_Contrato, 2, ',','.')}}</td>
							          <td>{{number_format($datos->total_Pagado_Contrato, 2, ',','.')}}</td>
							          <td>{{number_format($datos->faltante_Pagar_Contrato, 2, ',','.')}}</td> 
						            	@if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
							          		<td class=" col-lg-1" style="text-align: center">
												<div  style="; text-align: center">
							                        	<div class="icon-reorder tooltips" data-original-title="Ver Opciones" data-placement="bottom"  >
													<a class="btn btn-primary" href="{!!URL::to('/PagosContrato/'.$datos->id)!!}" style="text-align: center; ">
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
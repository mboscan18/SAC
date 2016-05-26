@extends('layouts.principal')
  @section('page-title', 'Proyectos')
 
@section('titulo')  
    <h3 class="page-header"><img alt="" src="{!!URL::asset('/img/icon_project_big.png')!!}" style="width: 35px"> Proyectos</h3>
@endsection
@section('lugar')
   <li><img alt="" src="{!!URL::asset('/img/icon_project_small.png')!!}" style="width: 15px"> Proyecto</li>
@endsection
@section('accion')
@endsection

  @section('content')
        @include('alerts.messages')

          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading " style="background-color: #1a2732; color: #9cd5eb">Proyectos</div>
                <div class="panel-body" >
	              		<div class="datoBancario">
							<table class="table" id="tabla_Proyectos">
					      		<thead>
					      			<th>Cod Proyecto</th>
							        <th>Titulo de Proyecto</th>
							        <th>Porcentaje</th>
							        <th>Valor del Proyecto</th>
							        <th>Monto a Pagar</th>
							        <th>Enviado a Pagar</th>
							        <th>Faltante por Enviar a Pagar</th>
							        <th>Pagado</th>
							        <th>Faltante por Pagar</th>
							        @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'contador'))
							        	<th>Operacion</th>
							        @endif	
						      	</thead>
						        <tbody>
						      @foreach($resumenProyectos as $datos)
							      <tr>
							          <td>{{$datos->cod_Proyecto}}</td>
							          <td>{{$datos->nombre_Proyecto}}</td>
							          <td>{{number_format($datos->porcentaje_Ejecutado, 2, ',','.')}}%</td>
							          <td>{{number_format($datos->valor_Proyecto, 2, ',','.')}}</td>
							          <td>{{number_format($datos->monto_Pagar_Proyecto, 2, ',','.')}}</td>
							          <td>{{number_format($datos->enviado_Pagar_Proyecto, 2, ',','.')}}</td>
							          <td>{{number_format($datos->faltante_Enviar_Pagar_Proyecto, 2, ',','.')}}</td>
							          <td>{{number_format($datos->total_Pagado_Proyecto, 2, ',','.')}}</td>
							          <td>{{number_format($datos->faltante_Pagar_Proyecto, 2, ',','.')}}</td> 
						            	@if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'contador'))
							          		<td class=" col-lg-1" style="text-align: center">
												<div  style="; text-align: center">
							                        	<div class="icon-reorder tooltips" data-original-title="Ver Opciones" data-placement="bottom"  >
													<a class="btn btn-primary" href="{!!URL::to('/PagosProyecto/'.$datos->id)!!}" style="text-align: center; ">
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
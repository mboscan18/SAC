@extends('layouts.principal')
  @section('page-title', 'Pagos Pendientes')
 
@section('titulo')  
    <h3 class="page-header"><img alt="" src="{!!URL::asset('/img/icon_project_big.png')!!}" style="width: 35px"> Boletines</h3>
@endsection
@section('lugar')
   <li><img alt="" src="{!!URL::asset('/img/icon_project_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Pagos')!!}">Proyectos</a></li>
@endsection
@section('accion')
@endsection

  @section('content')
        @include('alerts.messages')

          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-primary">
            
                <div class="panel-body" >
	              		<div class="datoBancario">
							<table class="table" id="tabla_Proyectos">
					      		<thead>
					      			<th>Administrador</th>
					      			<th>Cod. Proyecto</th>
					      			<th>Proyecto</th>
					      			<th>Cod. Contrato</th>
					      			<th>Contrato</th>
							        <th>Proveedor</th>
					      			<th>Nro Boletín</th>
							        <th>Enviado a Pagar</th>
							        <th>Pagado</th>
							        <th>Faltante por Pagar</th>
							        <th>Fecha de pago</th>
							        <th>Dias de mora</th>	
						      	</thead>
						        <tbody>
						      @foreach($resumenPagosPendientes as $datos)
							      <tr>
							          <td>{{$datos->usuario}}</td>
							          <td>{{$datos->codProyecto}}</td>
							          <td>{{$datos->nombreProyecto}}</td>
							          <td>{{$datos->codContrato}}</td>
							          <td>{{$datos->nombreContrato}}</td>
							          <td>{{$datos->nombreProveedor}}</td>
							          <td>{{$datos->nro_Boletin}}</td>
							          <td>{{number_format($datos->neto_Pagar, 2, ',','.')}}</td>
							          <td>{{number_format($datos->monto_pagado, 2, ',','.')}}</td>
							          <td>{{number_format($datos->diferencia_pago, 2, ',','.')}}</td>
							          <td>{{date('d-m-Y', strtotime($datos->fechaPago))}}</td>
							          <td>{{$datos->diasMora}}</td>
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
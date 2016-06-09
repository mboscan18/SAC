@extends('layouts.principal')
  @section('page-title', 'Pagos del Boletín')
 
@section('titulo')  
    <h3 class="page-header"><img alt="" src="{!!URL::asset('/img/icon_project_big.png')!!}" style="width: 35px"> Pagos del Boletín</h3>
@endsection
@section('lugar')
   </li><li><img alt="" src="{!!URL::asset('/img/icon_project_small.png')!!}" style="width: 15px"><a href="{!!URL::to('ProyectosUsuario/'.Auth::user()->id)!!}"> Proyectos</a></li>
    <li><i class="fa fa-gears"></i> <a href="{!!URL::to('OpcionesProyecto/'.$valuacion->contrato->proyecto->id)!!}"> Opciones del Proyecto</a></li>
    <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Contrato/'.$valuacion->contrato->proyecto->id)!!}"> Contratos</a></li>
    <li><i class="fa fa-gears"></i><a href="{!!URL::to('/OpcionesContrato/'.$valuacion->contrato->id)!!}"> Opciones del Contrato</a></li>
   <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Boletines/'.$valuacion->contrato->id)!!}"> Valuaciones </a></li>
   <li><i class="fa fa-gears"></i><a href="{!!URL::to('/OpcionesValuacion/'.$valuacion->id)!!}">Opciones del Boletín</a></li>
   <li><i class="fa fa-gears"></i> Partidas Trabajadas</li>
@endsection
@section('accion')
@endsection

  @section('content')
        @include('alerts.messages')



          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-primary">
            	<div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb">
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            Pagos Sobre el Boletín
                        </div>
                        <a href="{!!URL::to('/OpcionesValuacion/'.$valuacion->id)!!}" >
                          <div class="col-lg-3 col-md-3 col-sm-12 fa fa-arrow-left" style="text-align: right; padding-top: 10px;">
                             <span class="font">
                                Volver a Opciones del Boletines
                              </span>
                          </div>
                        </a>
                    </div>
                <div class="panel-body" >

                		<div id="Cabecera">
                          <div class="col-lg-10 col-md-10 col-sm-10">
                              <div class="col-lg-3 col-md-3 col-sm-3">
                                  <b class="tam-12-5">PROYECTO: </b>
                              </div>
                              <div class="col-lg-9 col-md-9 col-sm-9">
                                  <p class="tam-12-5">{{strtoupper($contrato->proyecto->nombre_Proyecto)}}</p>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-3">
                                  <b class="tam-12-5">OBJETO DEL CONTRATO: </b>
                              </div>
                              <div class="col-lg-9 col-md-9 col-sm-9">
                                  <p class="tam-12-5">{{strtoupper($contrato->descripcion)}}</p>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-3" style="height: 28px;">
                                  <b class="tam-12-5">EMPRESA CLIENTE: </b>
                              </div>
                              <div class="col-lg-9 col-md-9 col-sm-9" style="height: 28px;">
                                <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center">
                                    <img src="{!!URL::asset('/archivos/'.$contrato->proyecto->empresa->logo)!!}" alt="" style="height: 25px;"/>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    {{$contrato->proyecto->empresa->nombre_Empresa}}
                                </div>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-3" style="height: 28px;">
                                  <b class="tam-12-5">EMPRESA CONTRATISTA: </b>
                              </div>
                              <div class="col-lg-9 col-md-9 col-sm-9" style="height: 28px;">
                                <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center">
                                    <img src="{!!URL::asset('/archivos/'.$contrato->empresaProveedor->logo)!!}" alt="" style="height: 25px"/>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    {{$contrato->empresaProveedor->nombre_Empresa}}
                                </div>
                              </div>
                          </div>
                          <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center">
                                <b class="tam-12-5">NRO DEL CONTRATO: </b><br>
                                {{$contrato->nro_Contrato}}<br><br>
                                <b class="tam-12-5">VALOR DEL CONTRATO: </b><br>
                                {{$contrato->moneda->symbol}} {{number_format($valorContrato, 2, ',', '.')}}
                          </div>
                          <div class="col-lg-12 col-md-12 col-sm-12"><br></div>
                          <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center">
                                <b class="tam-12-5">BOLETÍN: </b><br>
                                {{$valuacion->nro_Boletin}}
                          </div>
                          <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center">
                                <b class="tam-12-5">VALUACIÓN: </b><br>
                                {{$valuacion->nro_Valuacion}}
                          </div>
                          <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center">
                                <b class="tam-12-5">AV. FÍSICO: </b><br>
                                {{number_format($valuacion->avance_fisico, 2, ',','.')}} %
                          </div>
                          <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center">
                                <b class="tam-12-5">AV. FINANCIERO: </b><br>
                                {{number_format($valuacion->avance_financiero, 2, ',','.')}} %
                          </div>
                          <div class="col-lg-4 col-md-3 col-sm-3" style="text-align: center">
                                <b class="tam-12-5">PERÍODO: </b><br>
                                {{date('d-m-Y', strtotime($valuacion->fecha_Inicio_Periodo))}} {{date('d-m-Y', strtotime($valuacion->fecha_Fin_Periodo))}}
                          </div>

                          
                          @if($factura != null)
                          <div class="col-lg-12 col-md-12 col-sm-12"><br></div>

                      <div class="row ">
                          <div class="col-lg-12 col-md-12 col-sm-12" style="background-color: #d4e2ed; color: #20374a; margin-top: 20px; ">
                              <div class=" form-group col-lg-12 col-md-12 col-sm-12" style="background-color: #c1ced8; color: #20374a; width: 100%">
                                  Estado del Boletín
                              </div>
                              <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
                                  {!!Form::label('periodo','Monto Ejecutado de Valuación sin IVA:')!!}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6" >
                                  <b>{{$valuacion->contrato->moneda->symbol}}</b> {{number_format($resumenValuacion->monto_Valuado, 2, ',','.')}}
                                </div> 
                              </div>
                              <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
                                  {!!Form::label('periodo','Monto de IVA:')!!}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6" >
                                  <b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label(' ',number_format($resumenValuacion->monto_IVA, 2, ',','.'))!!} 
                                </div>  
                              </div>
                              <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
                                  {!!Form::label('periodo','Anticipo de Obra:')!!}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6" >
                                  <b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label(' ',number_format($resumenValuacion->anticipo, 2, ',','.'))!!}
                                </div>  
                              </div>
                              <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
                                  {!!Form::label('periodo','Adelantos:')!!}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6" >
                                  <b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label(' ',number_format($resumenValuacion->adelantos, 2, ',','.'))!!}
                                </div>  
                              </div>
                              <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
                                  {!!Form::label('periodo','Descuentos:')!!}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6" >
                                  <b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label(' ',number_format($resumenValuacion->descuentos, 2, ',','.'))!!}
                                </div>  
                              </div>
                              <div class="col-lg-2 col-md-2 col-sm-2"></div>
                              <div class="col-lg-8 col-md-8 col-sm-8">
                                <div style="height: 2px; background-color: #182e3f; width: 100%"></div>
                              </div>
                              <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
                                  <b>Total sin Aplicar Retenciones:</b>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6" >
                                  <b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('',number_format($factura->monto_Total, 2, ',','.'),[ 'id'=>'', 'style'=>'font-weight: bold;'])!!}
                                </div>  
                              </div>
                              <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
                                  {!!Form::label('periodo','Monto de Retenciones:')!!}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6" >
                                  <b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('montoRetenciones_Form',number_format(($montoRetenciones*-1), 2, ',','.'),[ 'id'=>'montoRetenciones_Form'])!!}
                                </div>  
                              </div>
                              <div class="col-lg-2 col-md-2 col-sm-2"></div>
                              <div class="col-lg-8 col-md-8 col-sm-8">
                                <div style="height: 2px; background-color: #182e3f; width: 100%"></div>
                              </div>
                              <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
                                  <b>Monto Total a Pagar:</b>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6" >
                                  <b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('totalPagar_Form',number_format($resumenValuacion->neto_Pagar, 2, ',','.'),[ 'id'=>'totalPagar_Form', 'style'=>'font-weight: bold;'])!!}
                                </div>  
                              </div>
                              <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
                                  {!!Form::label('periodo','Monto Pagado:')!!}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6" >
                                  <b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('montoRetenciones_Form',number_format($resumenValuacion->monto_pagado, 2, ',','.'),[ 'id'=>'montoRetenciones_Form'])!!}
                                </div>  
                              </div>
                              <div class="col-lg-2 col-md-2 col-sm-2"></div>
                              <div class="col-lg-8 col-md-8 col-sm-8">
                                <div style="height: 2px; background-color: #182e3f; width: 100%"></div>
                              </div>

                              

                              <div class="row " style="background-color: #95aec2; margin-left: 0px; margin-right: 0px">
                                <div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
                                  <b>Monto Restante por Pagar:</b>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6" >
                                  <b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('totalPagar_Form',number_format($resumenValuacion->diferencia_pago, 2, ',','.'),[ 'id'=>'totalPagar_Form', 'style'=>'font-weight: bold;'])!!}
                                  {!!Form::hidden('totalPagar_Form_hidden',$resumenValuacion->diferencia_pago,['id'=>'totalPagar_Form_hidden'])!!}
                                </div>  
                              </div>
                          </div> 
                      </div> 
                          @endif

                      </div>  <!-- Fin Cabecera -->

                      <div class="col-lg-12 col-md-12 col-sm-12"><br><br></div>
                      <div class="col-lg-12 col-md-12 col-sm-12">
                          <h4 class="">Pagos Realizados</h4>
                      </div>
                      <div style="background-color: #688a7e; height: 16px" class="col-lg-12 col-md-12 col-sm-12"></div>
                      <div class="col-lg-12 col-md-12 col-sm-12"><br></div>

	              		<div class="datoBancario">
							<table class="table" id="tabla_Proyectos">
					      		<thead>
					      			<th>Comprobante</th>
							        <th>Tipo de Pago</th>
							        <th>Nro Comprobante</th>
							        <th>Fecha Emision</th>
							        <th>Monto Pagado</th>	
						      	</thead>
						        <tbody>
						      @foreach($pagos as $datos)
							      <tr>
							          <td>
							          	@if($datos->comprobante == null)
							          		&nbsp; &nbsp; &nbsp; &nbsp;-
							          	@else
                            <a href="{!!URL::asset('/archivos/'.$datos->comprobante)!!}" target="_blank">Comprobante</a>
							          	@endif	
							          </td>
							          <td>{{$datos->tipoPago->descripcion}}</td>
							          <td>{{$datos->nroComprobante}}</td>
							          <td>{{date('d-m-Y', strtotime($datos->fechaEmision))}}</td>
							          <td>{{number_format($datos->monto_Pago, 2, ',','.')}}</td>
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
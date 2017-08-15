@extends('layouts.principal')
@section('page-title', 'Opciones del Boletín')

@section('titulo')  
    <h3 class="page-header"><i class="icon_building"></i>Opciones del Boletín</h3>
@endsection
@section('lugar')
     </li><li><img alt="" src="{!!URL::asset('/img/icon_project_small.png')!!}" style="width: 15px"><a href="{!!URL::to('ProyectosUsuario/'.Auth::user()->id)!!}"> Proyectos</a></li>
    <li><i class="fa fa-gears"></i> <a href="{!!URL::to('OpcionesProyecto/'.$valuacion->contrato->proyecto->id)!!}"> Opciones del Proyecto</a></li>
    <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Contrato/'.$valuacion->contrato->proyecto->id)!!}"> Contratos</a></li>
    <li><i class="fa fa-gears"></i><a href="{!!URL::to('/OpcionesContrato/'.$valuacion->contrato->id)!!}"> Opciones del Contrato</a></li>
   <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Boletines/'.$valuacion->contrato->id)!!}"> Valuaciones </a></li>
   <li><i class="fa fa-gears"></i> Opciones del Boletín</li>
@endsection
@section('accion')
@endsection

    @section('content')
        @include('alerts.messages')
        @include('alerts.errors')
        @include('alerts.info')
        @include('alerts.warnings')

        <?php
            Session::put('valuacion',$valuacion);
        ?>
        <!-- page start-->
        <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="panel panel-primary">
                  <div class="panel-heading " style="background-color: #1a2732; color: #9cd5eb;">
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            Opciones del Boletín 
                        </div>
                        <a href="{!!URL::to('/Boletines/'.$valuacion->contrato->id)!!}" >
                          <div class="col-lg-3 col-md-3 col-sm-12 fa fa-arrow-left" style="text-align: right; padding-top: 10px">
                             <span class="font">
                                Volver a Valuaciones
                              </span>
                          </div>
                        </a>
                      </div>
                  <div class="panel-body" >

                      <div id="Cabecera">
                          <div class="col-lg-12 col-md-12 col-sm-12">

                                  <div class="col-lg-12 col-md-6 col-sm-6" style="text-align: right;">
                                      <div class="col-lg-12 col-md-12 col-sm-12">
                                          <b class="tam-12-5">VALOR DEL CONTRATO: </b> <p>{{$contrato->moneda->symbol}} {{number_format($valorContrato, 2, ',', '.')}}</p>
                                      </div>
                                  </div>

                                  <div class="col-lg-12 col-md-6 col-sm-6">
                                      <div class="col-lg-2 col-md-12 col-sm-12" style="margin-left: -15px">
                                          <b class="tam-12-5">PROYECTO: </b>
                                      </div>
                                      <div class="col-lg-2 col-md-12 col-sm-12">
                                          <b class="tam-12-5">Cod. </b><p class="tam-12-5">{{$contrato->proyecto->cod_Proyecto}}</p>
                                      </div>
                                      <div class="col-lg-8 col-md-12 col-sm-12">
                                          <b class="tam-12-5">Desc. </b><p class="tam-12-5">{{strtoupper($contrato->proyecto->nombre_Proyecto)}}</p>
                                      </div>
                                  </div>

                                  <div style="background-color: #1a2732; height: 2px" class="col-lg-12 col-md-12 col-sm-12"></div>
                                  <div class="col-lg-12 col-md-12 col-sm-12"><br></div>
                                  
                                  <div class="col-lg-12 col-md-6 col-sm-6">
                                      <div class="col-lg-2 col-md-12 col-sm-12" style="margin-left: -15px">
                                          <b class="tam-12-5">CONTRATO: </b>
                                      </div>
                                      <div class="col-lg-2 col-md-12 col-sm-12">
                                          <b class="tam-12-5">Cod. </b><p class="tam-12-5">{{$contrato->nro_Contrato}}</p>
                                      </div>
                                      <div class="col-lg-8 col-md-12 col-sm-12">
                                          <b class="tam-12-5">Desc. </b><p class="tam-12-5">{{strtoupper($contrato->descripcion)}}</p>
                                      </div>
                                  </div>

                                  <div style="background-color: #1a2732; height: 2px" class="col-lg-12 col-md-12 col-sm-12"></div>
                                  <div class="col-lg-12 col-md-12 col-sm-12"><br></div>

                                  <div class="col-lg-6 col-md-6 col-sm-6">
                                      <div class="col-lg-12 col-md-12 col-sm-12" style="margin-left: -15px">
                                          <b class="tam-12-5">EMPRESA CLIENTE: </b>
                                      </div>
                                      <div class="col-lg-12 col-md-12 col-sm-12" >
                                          <img src="{!!URL::asset('/archivos/'.$contrato->proyecto->empresa->logo)!!}" alt="" style="height: 25px;"/>
                                      </div> 
                                      <div class="col-lg-12 col-md-12 col-sm-12">
                                          <p >{{$contrato->proyecto->empresa->nombre_Empresa}}</p>
                                      </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6 col-sm-6">
                                      <div class="col-lg-12 col-md-12 col-sm-12" style="margin-left: -15px">
                                          <b class="tam-12-5">EMPRESA CONTRATISTA: </b>
                                      </div>
                                      <div class="col-lg-12 col-md-12 col-sm-12" >
                                          <img src="{!!URL::asset('/archivos/'.$contrato->empresaProveedor->logo)!!}" alt="" style="height: 25px;"/>
                                      </div> 
                                      <div class="col-lg-12 col-md-12 col-sm-12">
                                          <p >{{$contrato->empresaProveedor->nombre_Empresa}}</p>
                                      </div>
                                  </div>

                                  <div style="background-color: #1a2732; height: 2px" class="col-lg-12 col-md-12 col-sm-12"></div>
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
                                <b class="tam-12-5">TOTAL A PAGAR EN BOLETÍN: </b><br>
                                {{$contrato->moneda->symbol}} {{number_format($valorValuacion->monto_Total, 2, ',','.')}}
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
                          <h4 class="">Opciones del Boletín</h4>
                      </div>   
                      <div style="background-color: #688a7e; height: 16px" class="col-lg-12 col-md-12 col-sm-12"></div>
                      <div class="col-lg-12 col-md-12 col-sm-12"><br></div>


                          <a href="{!!URL::to('/Valuaciones/'.$valuacion->id.'/edit')!!}"> 
                      <div class=" col-lg-4 col-md-4 col-sm-12 col-xs-12" style="text-align: center">
                          <div class="info-box blue-bg" style="text-align:center;  vertical-align: middle;">
                            <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-left: -5%;  vertical-align: middle;">
                                <img alt="" src="{!!URL::asset('/img/valuaciones.png')!!}" style="height: 95px;">
                            </div>
                            <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-8" style="margin-left: 3%">
                                <div class="count" >Boletín</div>
                                <div class="title" >Información del Boletín</div> 
                            </div>
                          </div>
                            <div class=" botn col-lg-12" style="margin-top: -40px; width: 100%;">
                                <span class="glyphicon glyphicon-ok tam-18" style="margin-top: -3px;color: #6a954d;"></span> &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;
                                <span class="" style="">Ver Información del Boletín</span>
                            </div>
                      </div>
                          </a> 

                      <div class=" col-lg-4 col-md-4 col-sm-12 col-xs-12" style="text-align: center">
                          <div class="info-box blue-bg" style="text-align:center">
                            <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-left: -5%;  vertical-align: middle;">
                                <img alt="" src="{!!URL::asset('/img/icon_contrato.png')!!}" style="height: 85px;">
                            </div>
                            <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-8" style="margin-left: 4%">
                                <div class="count" >Adelantos</div>
                                <div class="title" >Anticipos y Adelantos</div> 
                            </div>
                          </div>
                          @if($anticipoIsTrabajado > 0)
                            <a href="{!!URL::to('/Anticipo/'.$valuacion->id)!!}"> 
                            <div class=" botn col-lg-12" style="margin-top: -40px; width: 100%;">
                                  <span class="glyphicon glyphicon-ok tam-18" style="margin-top: -3px;color: #6a954d;"></span> &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;
                                  <span class="" style="">Ver Anticipos y Adelantos</span>
                              </div>
                            </a> 
                          @else
                            <a href="{!!URL::to('/Anticipo/'.$valuacion->id)!!}"> 
                            <div class="botn " style="margin-top: -40px; width: 100%">
                                Ver Anticipos y Adelantos
                            </div>
                            </a> 
                          @endif
                      </div>

                      <div class=" col-lg-4 col-md-4 col-sm-12 col-xs-12" style="text-align: center; ">
                          <div class="info-box blue-bg" style="text-align:center;  vertical-align: middle;">
                            <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-left: -8%;  vertical-align: middle;">
                                <img alt="" src="{!!URL::asset('/img/presupuesto.png')!!}" style="height: 85px;">
                            </div>
                            <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-8" style="margin-left: 4%">
                                <div class="count" >Partidas</div>
                                <div class="title" >Partidas trabajadas en el Período</div> 
                            </div>
                          </div>
                           
                          @if($detalleIsTrabajado > 0)
                            <a  href="{!!URL::to('/DetalleValuacion/'.$valuacion->id.'/null')!!}" style="padding-right: 0px"> 
                              <div class=" botn col-lg-12" style="margin-top: -40px; width: 100%;">
                                  <span class="glyphicon glyphicon-ok tam-18" style="margin-top: -3px;color: #6a954d;"></span> &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;
                                  <span class="" style="">Ver Partidas Trabajadas</span>
                              </div>
                            </a> 
                          @else
                            <a href="{!!URL::to('/DetalleValuacion/'.$valuacion->id.'/null')!!}"> 
                            <div class="botn " style="margin-top: -40px; width: 100%">
                                Ver Partidas Trabajadas
                            </div>
                            </a> 
                          @endif
                      </div>

                      <div class="col-lg-12 col-md-12 col-sm-12"><br><br></div>
                      @if($valuacion->lista != 'S')
                        <div class="col-lg-2 col-md-2 col-sm-2"><br><br></div>
                      @endif

                      <div class=" col-lg-4 col-md-4 col-sm-12 col-xs-12" style="text-align: center">
                          <div class="info-box blue-bg" style="text-align:center;  vertical-align: middle;">
                            <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-left: -8%;  vertical-align: middle;">
                                <img alt="" src="{!!URL::asset('/img/presupuesto.png')!!}" style="height: 85px;">
                            </div>
                            <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-8" style="margin-left: 4%">
                                <div class="count" >Descuentos</div>
                                <div class="title" >Descuentos y Amortizaciones</div> 
                            </div>
                          </div>
                          @if($descuentoIsTrabajado > 0)
                            <a  href="{!!URL::to('/Descuento/'.$valuacion->id)!!}" style="padding-right: 0px"> 
                              <div class=" botn col-lg-12" style="margin-top: -40px; width: 100%;">
                                  <span class="glyphicon glyphicon-ok tam-18" style="margin-top: -3px;color: #6a954d;"></span> &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;
                                  <span class="" style="">Ver Descuentos y Amortizaciones</span>
                              </div>
                            </a> 
                          @else
                            <a href="{!!URL::to('/Descuento/'.$valuacion->id)!!}"> 
                            <div class="botn " style="margin-top: -40px; width: 100%">
                                Ver Descuentos y Amortizaciones
                            </div>
                            </a> 
                          @endif

                          </a> 
                      </div>
                      @if($valuacion->lista == 'S')
                      <div class=" col-lg-4 col-md-4 col-sm-12 col-xs-12" style="text-align: center">
                          <div class="info-box blue-bg" style="text-align:center;  vertical-align: middle;">
                            <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-left: -8%;  vertical-align: middle;">
                                <img alt="" src="{!!URL::asset('/img/icon_creditCard.png')!!}" style="height: 85px;">
                            </div>
                            <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-8" style="margin-left: 4%">
                                <div class="count" >Pagos</div>
                                <div class="title" >Pagos sobre el Boletín</div> 
                            </div>
                          </div>
                          @if($pagos != null)
                            <a  href="{!!URL::to('/PagosBoletinValuacion/'.$valuacion->id)!!}" style="padding-right: 0px"> 
                              <div class=" botn col-lg-12" style="margin-top: -40px; width: 100%;">
                                  <span class="glyphicon glyphicon-ok tam-18" style="margin-top: -3px;color: #6a954d;"></span> &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;
                                  <span class="" style="">Ver Pagos Realizados</span>
                              </div>
                            </a> 
                          @else
                            <a href="{!!URL::to('/PagosBoletinValuacion/'.$valuacion->id)!!}"> 
                            <div class="botn " style="margin-top: -40px; width: 100%">
                                Ver Pagos Realizados
                            </div>
                            </a> 
                          @endif

                          </a> 
                      </div>
                      @endif
                      <div class=" col-lg-4 col-md-4 col-sm-12 col-xs-12" style="text-align: center">
                          <div class="info-box red-bg" style="text-align:center;  vertical-align: middle;">
                            <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-left: -5%;  vertical-align: middle;">
                                <img alt="" src="{!!URL::asset('/img/icon_contrato.png')!!}" style="height: 85px;">
                            </div>
                            <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-8" style="margin-left: 4%">
                                <div class="count" >Boletín</div>
                                <div class="title" >Imprimir Boletín de Valuación</div> 
                            </div>
                          </div>
                          @if($valuacionIsTrabajada > 0)
                            <a  data-toggle="collapse" href="#TipoBoletin" aria-expanded="false" aria-controls="TipoBoletin" > 
                              <div class=" botn col-lg-12" style="margin-top: -40px; width: 100%;">
                                  <span class="glyphicon glyphicon-ok tam-18" style="margin-top: -3px;color: #6a954d;"></span> &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;
                                  <span class="" style="">Generar Boletín de Valuacion</span>
                              </div>
                            </a> 
                          @else
                            <a data-toggle="collapse" href="#TipoBoletin" aria-expanded="false" aria-controls="TipoBoletin" > 
                            <div class="botn " style="margin-top: -40px; width: 100%">
                                Generar Boletín de Valuacion
                            </div>
                            </a> 
                          @endif
                          </a>
                          <div class="collapse" id="TipoBoletin">
                            <div class="well" style="height: 115px">
                                <div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12" style="text-align: center">
                                      <a href="{!!URL::to('/BoletinValuacion/'.$valuacion->id.'/1')!!}" target="_blank" > 
                                      <div class="cajita danger icon-reorder tooltips" style="text-align:center;"  data-original-title="Imprimir solo partidas Trabajadas" data-placement="bottom">
                                          <div class="title" >Partidas Trabajadas</div> 
                                      </div>
                                      </a> 
                                  </div>
                                  <div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12" style="text-align: center">
                                      <a href="{!!URL::to('/BoletinValuacion/'.$valuacion->id.'/2')!!}" target="_blank"  > 
                                      <div class="cajita danger icon-reorder tooltips" style="text-align:center; " data-original-title="Imprimir todas las Partidas" data-placement="bottom">
                                          <div class="title" >Todas las Partidas</div> 
                                      </div>
                                      </a> 
                                  </div>
                            </div>
                          </div> 
                      </div>

                      @if(($valuacion->lista == 'S') && ($estadoValuacion == 2))
                      <div class="col-lg-12 col-md-12 col-sm-12"><br><br></div>
                      <div class="col-lg-4 col-md-4 col-sm-4"><br><br></div>

                      <div class=" col-lg-4 col-md-4 col-sm-12 col-xs-12" style="text-align: center">
                          <div class="info-box blue-bg" style="text-align:center;  vertical-align: middle;">
                            <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-left: -8%;  vertical-align: middle;">
                                <img alt="" src="{!!URL::asset('/img/icon_config.png')!!}" style="height: 85px;">
                            </div>
                            <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-8" style="margin-left: 4%">
                                <div class="count" >Opciones</div>
                                <div class="title" >Más opciones sobre el Boletín</div> 
                            </div>
                          </div>
                            <a data-toggle="collapse" href="#OpcionesBoletin" aria-expanded="false" aria-controls="OpcionesBoletin" > 
                            <div class="botn " style="margin-top: -40px; width: 100%">
                                Ver Opciones
                            </div>
                            </a> 
                          </a>
                          <div class="collapse" id="OpcionesBoletin">
                            <div class="well" style="height: 115px">
                                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center">
                                      <a href="" data-toggle="modal" data-target="#Eliminar" style="text-align: center;"  id="eliminarFactura">
                                      <div class="cajita blue-bg icon-reorder tooltips" style="text-align:center;"  data-original-title="Imprimir solo partidas Trabajadas" data-placement="bottom">
                                          <div class="title" >Cancelar envío a pago del Boletín</div> 
                                      </div>
                                    </a>

                                            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Eliminar" class="modal fade ">
                                                <div class="modal-dialog " role="document">
                                                    <div class="modal-content">
                                                        <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb; text-align: left; height: 40px; padding-top: 6px">
                                                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                            <h4 class="modal-title">Eliminar Envío de Pago</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                          <strong>¿Está seguro que quiere eliminar el envío a pago del boletín?</strong> <br><br>
                                                          Al eliminarlo podrá volver a editar la valuación.<br><br>
                                                            <div class="col-lg-12 col-md-12 col-sm-12"><br></div>    
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:center">
                                                                <button type="button" class="boton boton-danger" data-dismiss="modal" style="width:100%"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar</button>
                                                            </div>
                                                            {!!Form::open(['route'=>['Facturas.destroy', $valuacion->factura], 'method' => 'DELETE'])!!}
                                                            <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:center">
                                                                <button href="" type="submit" class="boton" style="text-align: center; width:100%">
                                                                    <i class="fa fa-trash-o"></i> Eliminar
                                                                </button>
                                                            </div>
                                                            {!!Form::close()!!}
                                                      </div> 
                                                    </div>
                                                </div>
                                            </div>
                                  </div>
                            </div>
                          </div> 
                      </div>
                      @endif


                  </div>
              </div>

        </div>

 
<!-- Button trigger modal -->     

            <!-- page end-->

    
    @endsection

    @section('scripts')  
    @endsection
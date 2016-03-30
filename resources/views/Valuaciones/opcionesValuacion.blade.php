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
            Session::flash('valuacion',$valuacion);
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

                      <div class=" col-lg-2 col-md-2 "></div>

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


                  </div>
              </div>

        </div>

 
<!-- Button trigger modal -->     

            <!-- page end-->

    
    @endsection

    @section('scripts')  
    @endsection
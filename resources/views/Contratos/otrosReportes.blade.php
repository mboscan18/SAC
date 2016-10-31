@extends('layouts.principal')
@section('page-title', 'Otros Reportes')

@section('titulo')  
    <h3 class="page-header"><i class="icon_building"></i>Otros Reportes</h3>
@endsection
@section('lugar')
    </li><li><img alt="" src="{!!URL::asset('/img/icon_project_small.png')!!}" style="width: 15px"><a href="{!!URL::to('ProyectosUsuario/'.Auth::user()->id)!!}"> Proyectos</a></li>
    <li><i class="fa fa-gears"></i> <a href="{!!URL::to('OpcionesProyecto/'.$contrato->proyecto->id)!!}"> Opciones del Proyecto</a></li>
  <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Contrato/'.$contrato->proyecto->id)!!}"> Contratos </a></li>
   <li><i class="fa fa-gears"></i><a href="{!!URL::to('/OpcionesContrato/'.$contrato->id)!!}"> Opciones del Contrato</a></li>
   <li><i class="fa fa-gears"></i> Otros Reportes</li>
@endsection

    @section('content')
        @include('alerts.messages')
        @include('alerts.errors')
        @include('alerts.warnings')
        <!-- page start-->
        <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="panel panel-primary">
                  <div class="panel-heading " style="background-color: #1a2732; color: #9cd5eb;">
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            Otros Reportes
                        </div>
                        <a href="{!!URL::to('/OpcionesContrato/'.$contrato->id)!!}" >
                          <div class="col-lg-3 col-md-3 col-sm-12 fa fa-arrow-left" style="text-align: right; padding-top: 10px;">
                             <span class="font">
                                Volver a Opciones del Contrato
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
                      </div>  <!-- Fin Cabecera -->

                      <div class="col-lg-12 col-md-12 col-sm-12"><br><br></div>
                      <div class="col-lg-12 col-md-12 col-sm-12">
                          <h4 class="">Otros Reportes</h4>
                      </div>   
                      <div style="background-color: #688a7e; height: 16px" class="col-lg-12 col-md-12 col-sm-12"></div>
                      <div class="col-lg-12 col-md-12 col-sm-12"><br></div>

                      <div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center">
                                <div class="info-box red-bg" style="text-align:center; ">
                                  <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-left: -5%;  vertical-align: middle; ">
                                      <img alt="" src="{!!URL::asset('/img/icon_contrato.png')!!}" style="height: 85px;">
                                  </div>
                                  <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-8" style="margin-left: ;">
                                      <div class="count" >Orden Servicio</div>
                                      <div class="title" >Ordenes de Servicio</div> 
                                  </div>
                                </div>
                                <a data-toggle="collapse" href="#OrdenesServicio" aria-expanded="false" aria-controls="TipoBoletin" > 
                                  <div class="botn " style="margin-top: -40px; width: 100%">
                                      Ordenes de servicio
                                  </div>
                                  </a>
                                
                                <div class="collapse" id="OrdenesServicio">
                                  <?php $tam = (90*($nroAdendum+1))-(($nroAdendum+1)*5); ?>
                                  <div class="well" style="height: {{$tam}}px">
                                    <?php for ($i=0; $i < ($nroAdendum+1); $i++) { ?>
                                        @if($i == $nroAdendum)
                                            <div class=" col-lg-10 col-md-10 col-sm-10 col-xs-10" style="text-align: center">
                                                <a href="{!!URL::to('/OrdenDeServicioAdendum/'.$contrato->id.'/'.$i)!!}" target="_blank" > 
                                                <div class="cajita2 danger icon-reorder tooltips" style="text-align:center; "  data-original-title="Imprimir Orden de Servicio {{$i+1}}" data-placement="left">
                                                    <div class="title" >Imprimir Orden de Servicio {{$i+1}}</div> 
                                                </div>
                                                </a> 
                                            </div>
                                            <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" style="text-align: center; ">
                                                <div class="trash icon-reorder tooltips" style="text-align:center;" data-toggle="modal" data-target="#Eliminar" data-original-title="Eliminar Orden de Servicio {{$i+1}}" data-placement="bottom">
                                                    <div class="title" ><i class="fa fa-trash fa-3x"></i></div> 
                                                </div>
                                            </div>

                                            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Eliminar" class="modal fade ">
                                                <div class="modal-dialog " role="document">
                                                    <div class="modal-content">
                                                        <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb; text-align: left; height: 40px; padding-top: 6px">
                                                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                            <h4 class="modal-title">Eliminar Orden de Servicio</h4>
                                                        </div>
                                                        <div class="modal-body" style="text-align: left">
                                                          <strong>¿Está seguro que quiere Eliminar la Orden de Servicio?</strong> <br><br>
                                                          Al eliminar la Orden de Servicio se eliminará la aprobación de los siguientes elementos: <br><br>
                                                          &nbsp; &nbsp; &nbsp; &nbsp; - Precios y Cantidades de las Partidas<br>
                                                          &nbsp; &nbsp; &nbsp; &nbsp; - Condiciones de la Orden de Servicio<br>
                                                          &nbsp; &nbsp; &nbsp; &nbsp; - Monto del Contrato<br>
                                                            <div class="col-lg-12 col-md-12 col-sm-12"><br></div>    
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:center">
                                                                <button type="button" class="boton boton-danger" data-dismiss="modal" style="width:100%"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar</button>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 ">
                                                              <a href="{!!URL::to('/EliminarFirmadoContrato/'.$contrato->id)!!}"  class="boton col-lg-6 col-md-6 col-sm-6" style="width:100%; text-align: center">
                                                                <i class="fa fa-trash-o fa-lg"></i> Eliminar
                                                              </a>
                                                            </div>
                                                      </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center">
                                                <a href="{!!URL::to('/OrdenDeServicioAdendum/'.$contrato->id.'/'.$i)!!}" target="_blank" > 
                                                <div class="cajita2 danger icon-reorder tooltips" style="text-align:center; "  data-original-title="Imprimir Orden de Servicio {{$i+1}}" data-placement="left">
                                                    <div class="title" >Imprimir Orden de Servicio {{$i+1}}</div> 
                                                </div>
                                                </a> 
                                            </div>
                                        @endif
                                    <?php } ?>
                                  </div>
                                </div> <!-- Fin del Collapse -->
                            </div>
                      </div>

                      <div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12" style="text-align: center">
                          <div class="info-box red-bg" style="text-align:center; ">
                            <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-left: -5%;  vertical-align: middle; ">
                                <img alt="" src="{!!URL::asset('/img/icon_contrato.png')!!}" style="height: 85px;">
                            </div>
                            <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-8" style="margin-left: ;">
                                <div class="count" >Resumen</div>
                                <div class="title" >Resumen de Valuaciones del Contrato</div> 
                            </div>
                          </div>
                          <a data-toggle="collapse" href="#OrdenesServicioi" aria-expanded="false" aria-controls="TipoBoletin" > 
                            <div class="botn " style="margin-top: -40px; width: 100%">
                                Resumen de Valuaciones
                            </div>
                            </a>
                          
                          <div class="collapse" id="OrdenesServicioi">
                                  <?php $tam = (90*($nroAdendum+1))-(($nroAdendum+1)*5); ?>
                            <div class="well" style="height: {{$tam}}px">
                              <?php for ($i=0; $i < ($nroAdendum+1); $i++) { ?>
                                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center">
                                      <a href="{!!URL::to('/OrdenDeServicioAdendum/'.$contrato->id.'/'.$i)!!}" target="_blank" > 
                                      <div class="cajita2 danger icon-reorder tooltips" style="text-align:center; "  data-original-title="Imprimir Orden de Servicio {{$i+1}}" data-placement="left">
                                          <div class="title" >Orden de Servicio {{$i+1}}</div> 
                                      </div>
                                      </a> 
                                  </div>
                              <?php } ?>
                            </div>
                          </div> <!-- Fin del Collapse -->
                        </div>
                  </div>
              </div>

        </div>

 
<!-- Button trigger modal -->     

            <!-- page end-->

    
    @endsection

    @section('scripts')  
    @endsection
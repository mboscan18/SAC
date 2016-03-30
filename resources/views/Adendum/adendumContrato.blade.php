@extends('layouts.principal')
@section('page-title', 'Adendum')

@section('titulo')  
    <h3 class="page-header"><i class="icon_building"></i>Adendum</h3>
@endsection
@section('lugar')
    </li><li><img alt="" src="{!!URL::asset('/img/icon_project_small.png')!!}" style="width: 15px"><a href="{!!URL::to('ProyectosUsuario/'.Auth::user()->id)!!}"> Proyectos</a></li>
    <li><i class="fa fa-gears"></i> <a href="{!!URL::to('OpcionesProyecto/'.$contrato->proyecto->id)!!}"> Opciones del Proyecto</a></li>
  <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Contrato/'.$contrato->proyecto->id)!!}"> Contratos </a></li>
   <li><i class="fa fa-gears"></i><a href="{!!URL::to('/OpcionesContrato/'.$contrato->id)!!}"> Opciones del Contrato</a></li>
   <li><i class="fa fa-gears"></i> Adendum</li>
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
                            Opciones del Adendum
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
                          <h4 class="">Adendum</h4>
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
                                      <div class="title" >Orden de Servicio</div> 
                                  </div>
                                </div>
                                <a href="{!!URL::to('/OrdenDeServicio/'.$contrato->id)!!}" target="_blank"> 
                                <div class="botn " style="margin-top: -40px; width: 100%">
                                    Generar Orden de Servicio
                                </div>
                                </a> 
                            </div>

                      <div class="col-lg-12 col-md-12 col-sm-12"><br></div>

                              <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center">
                                <div class="info-box blue-bg" style="text-align:center; ">
                                  <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-left: -5%;  vertical-align: middle; ">
                                      <img alt="" src="{!!URL::asset('/img/icon_contrato.png')!!}" style="height: 85px;">
                                  </div>
                                  <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-8" style="margin-left: 4%">
                                      <div class="count" >Contrato</div>
                                      <div class="title" >Informacion del Contrato</div> 
                                  </div>
                                </div>
                                <a href="{!!URL::to('/Adendum/EditContrato/'.$contrato->id)!!}"> 
                                <div class="botn " style="margin-top: -40px; width: 100%">
                                    Editar informacion del Contrato
                                </div>
                                </a> 
                            </div>
                      </div>

                      <div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12" style="text-align: center">
                          <div class="info-box blue-bg" style="text-align:center;  vertical-align: middle;">
                            <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-left: -8%;  vertical-align: middle;">
                                <img alt="" src="{!!URL::asset('/img/presupuesto.png')!!}" style="height: 85px;">
                            </div>
                            <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-8" style="margin-left: 4%">
                                <div class="count" >Presupuesto</div>
                                <div class="title" >Presupuesto del Contrato</div> 
                            </div>
                          </div>
                          <div class="botn " style="margin-top: -40px; width: 100%">
                            Opciones sobre el Presupuesto
                          </div>
                          <div class="" id="OpcionesPresupuesto" >
                            <div class="" style="padding-top: 19px; background-color: #f0eded; height: 185px">
                                  <div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12" style="text-align: center">
                                      <a href="{!!URL::to('/Adendum/CrearPartida/'.$contrato->id)!!}"> 
                                      <div class="info-box success" style="text-align:center; ">
                                          <div class="count" >Crear </div>
                                          <div class="title" >Adendum Crear Partida</div> 
                                      </div>
                                      </a> 
                                  </div>
                                  <div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12" style="text-align: center">
                                      <a href="{!!URL::to('/Adendum/EditPartida/'.$contrato->id)!!}"> 
                                      <div class="info-box warning" style="text-align:center; ">
                                          <div class="count" >Editar </div>
                                          <div class="title" >Adendum Editar Partida</div> 
                                      </div>
                                      </a> 
                                  </div>
                            </div> 
                          
                          </div><!-- Fin del Collapse -->
                        </div>
                  </div>
              </div>

        </div>

 
<!-- Button trigger modal -->     

            <!-- page end-->

    
    @endsection

    @section('scripts')  
    @endsection
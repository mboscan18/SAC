@extends('layouts.principal')
  @section('page-title', 'Enviar a Pagar Boletín')

@section('titulo')  
    <h3 class="page-header"><i class="icon_building"></i>Enviar a Pagar Boletín</h3>
@endsection
@section('lugar')
     </li><li><img alt="" src="{!!URL::asset('/img/icon_project_small.png')!!}" style="width: 15px"><a href="{!!URL::to('ProyectosUsuario/'.Auth::user()->id)!!}"> Proyectos</a></li>
    <li><i class="fa fa-gears"></i> <a href="{!!URL::to('OpcionesProyecto/'.$valuacion->contrato->proyecto->id)!!}"> Opciones del Proyecto</a></li>
    <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Contrato/'.$valuacion->contrato->proyecto->id)!!}"> Contratos</a></li>
    <li><i class="fa fa-gears"></i><a href="{!!URL::to('/OpcionesContrato/'.$valuacion->contrato->id)!!}"> Opciones del Contrato</a></li>
   <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Boletines/'.$valuacion->contrato->id)!!}"> Boletines </a></li>
   <li><i class="fa fa-gears"></i><a href="{!!URL::to('/OpcionesValuacion/'.$valuacion->id)!!}">Opciones del Boletín</a></li>
   <li><i class="fa fa-gears"></i> Enviar a Pagar Boletín</li>
@endsection
@section('accion')
@endsection

  @section('content')
      @include('alerts.request')
            <!-- page start-->
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb">
                      <div class="col-lg-9 col-md-9 col-sm-12">
                            Enviar a Pagar Boletín 
                        </div>
                        <a href="{!!URL::to('/OpcionesValuacion/'.$valuacion->id)!!}" >
                          <div class="col-lg-3 col-md-3 col-sm-12 fa fa-arrow-left " style="text-align: right; padding-top: 10px;">
                              <span class="font">
                                Volver a Opciones del Boletín
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
                      <div class="col-lg-12 col-md-12 col-sm-12"><br></div> 
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        {!!Form::open(['route'=>'Facturas.store', 'method'=>'POST'])!!}
                          @include('Facturas.form.factura')
                          <div class="col-lg-12 col-md-12 col-sm-12"><br><br><br></div> 
                            <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:center">
                                <button type="submit" class="boton" style="width:100%"><i class="fa fa-credit-card"></i> Enviar a Pagar</button>
                            </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 ">
                            <a href="{!!URL::to('/OpcionesValuacion/'.$valuacion->id)!!}"  class="boton boton-danger col-lg-6 col-md-6 col-sm-6" style="width:100%; text-align: center">
                              <i class="fa fa-arrow-left fa-lg"></i> Volver a Opciones del Boletín
                            </a>
                          </div>
                          </div>
                        {!!Form::close()!!}
                      </div>

                    </div>
                </div>
              </div>
            <!-- page end-->
@endsection

    @section('scripts')
        {!!Html::script('js/Script_Factura.js')!!}
    @endsection
@extends('layouts.principal')
@section('page-title', 'Cargar Pago')

@section('titulo')  
    <h3 class="page-header"><i class="icon_building"></i>Cargar Pago</h3>
@endsection
@section('lugar')
   <li><img alt="" src="{!!URL::asset('/img/icon_project_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Pagos')!!}">Proyectos</a></li>
   <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/PagosProyecto/'.$contrato->proyecto->id)!!}">Contratos</a></li>
   <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/PagosContrato/'.$contrato->id)!!}">Boletines</a> </li>
   <li><i class="fa fa-credit-card"></i><a href="{!!URL::to('/PagosBoletin/'.$valuacion->id)!!}">Pagos Realizados</a> </li>
@endsection
@section('accion')
    <li><i class="fa fa-plus"></i>Cargar Pago</li>
@endsection

  @section('content')
            <!-- page start-->
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb">
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            Crear Pago
                        </div>
                        <a href="{!!URL::to('/PagosBoletin/'.$valuacion->id)!!}" >
                          <div class="col-lg-3 col-md-3 col-sm-12 fa fa-arrow-left" style="text-align: right; padding-top: 10px;">
                             <span class="font">
                                Volver a Pagos Realizados
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
                            <h4 class="">Crear Pago</h4>
                        </div>   
                        <div style="background-color: #688a7e; height: 16px" class="col-lg-12 col-md-12 col-sm-12"></div>
                        <div class="col-lg-12 col-md-12 col-sm-12"><br></div> 
                      
                      {!!Form::open(['route'=>'Pagos.store', 'method'=>'POST','files' => true])!!}
                          
                          @include('Pagos.form.pagos')

                          <div class="form-group row" >
                            <br>
                              <div class="col-lg-6" style="text-align: right">
                                {!!Form::label('foto','Foto del Comprobante (Opcional):')!!}
                              </div>
                              <div class="col-lg-6">
                                {!!Form::file('comprobante',['accept' => '*'])!!}
                              </div>
                          </div>

                          <br>
                          <div class="col-lg-3 col-md-3 col-sm-3"></div>
                          <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:center">
                              <button type="submit" class="boton" style="width:100%"><i class="icon_floppy"></i> Registrar</button>
                          </div>
                          <div class="col-lg-3 col-md-3 col-sm-3"></div>
                      {!!Form::close()!!}
                    </div>
                </div>
              </div>
            <!-- page end-->
@endsection
@section('scripts')
    {!!Html::script('js/Script_Pagos.js')!!}
@endsection
@extends('layouts.principal')
@section('page-title', 'Descuentos')

@section('titulo')  
    <h3 class="page-header"><i class="icon_building"></i>Descuentos</h3>
@endsection
@section('lugar')
    <li><img alt="" src="{!!URL::asset('/img/icon_project_small.png')!!}" style="width: 15px"><a href="{!!URL::to('ProyectosUsuario/'.Auth::user()->id)!!}"> Proyectos</a></li>
    <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Contrato/'.$valuacion->contrato->proyecto->id)!!}"> Opciones del Proyecto</a></li>
    <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Contrato/'.$valuacion->contrato->proyecto->id)!!}"> Contratos</a></li>
    <li><i class="fa fa-gears"></i><a href="{!!URL::to('/OpcionesContrato/'.$valuacion->contrato->id)!!}"> Opciones del Contrato</a></li>
   <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Boletines/'.$valuacion->contrato->id)!!}"> Valuaciones </a></li>
   <li><i class="fa fa-gears"></i><a href="{!!URL::to('/OpcionesValuacion/'.$valuacion->id)!!}">Opciones del Boletín</a></li>
   <li><i class="icon_building"></i> Descuentos </li>
@endsection
@section('accion')
@endsection

    @section('content')
        @include('alerts.messages')
        @include('alerts.errors')
        @include('alerts.info')
        @include('alerts.warnings')
        <!-- page start-->
        <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="panel panel-primary">
                  <div class="panel-heading " style="background-color: #1a2732; color: #9cd5eb;">
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            Descuentos 
                        </div>
                        <a href="{!!URL::to('/OpcionesValuacion/'.$valuacion->id)!!}" >
                          <div class="col-lg-3 col-md-3 col-sm-12 fa fa-arrow-left" style="text-align: right; padding-top: 10px">
                             Volver a Opciones del Boletín 
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
                                  <p class="tam-12-5">{{strtoupper($valuacion->contrato->proyecto->nombre_Proyecto)}}</p>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-3">
                                  <b class="tam-12-5">OBJETO DEL CONTRATO: </b>
                              </div>
                              <div class="col-lg-9 col-md-9 col-sm-9">
                                  <p class="tam-12-5">{{strtoupper($valuacion->contrato->descripcion)}}</p>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-3" style="height: 28px;">
                                  <b class="tam-12-5">EMPRESA CLIENTE: </b>
                              </div>
                              <div class="col-lg-9 col-md-9 col-sm-9" style="height: 28px;">
                                <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center">
                                    <img src="{!!URL::asset('/archivos/'.$valuacion->contrato->proyecto->empresa->logo)!!}" alt="" style="height: 25px;"/>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    {{$valuacion->contrato->proyecto->empresa->nombre_Empresa}}
                                </div>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-3" style="height: 28px;">
                                  <b class="tam-12-5">EMPRESA CONTRATISTA: </b>
                              </div>
                              <div class="col-lg-9 col-md-9 col-sm-9" style="height: 28px;">
                                <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center">
                                    <img src="{!!URL::asset('/archivos/'.$valuacion->contrato->empresaProveedor->logo)!!}" alt="" style="height: 25px"/>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    {{$valuacion->contrato->empresaProveedor->nombre_Empresa}}
                                </div>
                              </div>
                          </div>
                          <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center">
                                <b class="tam-12-5">NRO DEL CONTRATO: </b><br>
                                {{$valuacion->contrato->nro_Contrato}}<br><br>
                                <b class="tam-12-5">VALOR DEL CONTRATO: </b><br>
                                {{$valuacion->contrato->moneda->symbol}} {{number_format($valorContrato, 2, ',', '.')}}
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
                      <div class="col-lg-10 col-md-10 col-sm-10">
                          <h4 class="">Descuentos</h4>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-2" style="padding-bottom: 10px">
                          <button type="button" class="boton tam-13" data-toggle="modal" data-target="#boletin" style="width: 100%; heigth: 80%">
                            Crear Descuento
                          </button>
                      </div>   
                      <div style="background-color: #688a7e; height: 16px" class="col-lg-12 col-md-12 col-sm-12"></div>
                      <div class="" >
                            <br>
                            <div class="">
                              <table class="table" id="">
                                  <thead>
                                    <th>Tipo de Descuento</th>
                                    <th>Porcentaje de Descuento</th>
                                    <th>Monto de Descuento</th>
                                    @if(Auth::user()->rol_Usuario == 'administrador')
                                      <th>Ultima Modificacion</th>
                                    @endif  
                                    @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
                                      <th>Operaciones</th>
                                    @endif  
                                  </thead>
                                  <?php
                                      $i = 0;
                                  ?>
                                @foreach($descuentos as $datos)
                                  <tbody>
                                    @if($datos->tipo_Deduccion == 1)
                                      <td>Amortización de Anticipo</td>
                                    @elseif($datos->tipo_Deduccion == 2)
                                      <td>Descuento</td>
                                    @endif  
                                    <td>{{$datos->porcentaje_Deduccion}}</td>
                                    <td>{{$datos->monto_Deduccion}}</td>
                                    @if(Auth::user()->rol_Usuario == 'administrador')
                                      <td>
                                       {{$datos->user->nombre_Usuario}} {{$datos->user->apellido_Usuario}} | {{$datos->updated_at}}
                                      </td>
                                  @endif   
                                      @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
                                        <td class=" col-lg-1" style="text-align: center">
                                          <div class=" col-lg-1"  style=" text-align: center; ">
                                            <a href="{!!URL::to('/Valuaciones/'.$datos->id.'/edit')!!}" class="icon-reorder tooltips" data-original-title="Agregar Valuacion de Partidas" data-placement="bottom" style="text-align: center;">
                                                <img alt="" src="{!!URL::asset('/img/icon_edit.png')!!}" style="height: 30px; width: 30px">
                                            </a>
                                          </div>
                                          <div class=" col-lg-1"  style=" text-align: center; ">
                                            <a href="{!!URL::to('/Valuaciones/'.$datos->id.'/edit')!!}" class="icon-reorder tooltips" data-original-title="Agregar Orden de Pago" data-placement="bottom" style="text-align: center;">
                                                <img alt="" src="{!!URL::asset('/img/icon_edit.png')!!}" style="height: 30px; width: 30px">
                                            </a>
                                          </div>
                                    </td>
                                  @endif
                                  </tbody>
                                  <?php
                                      $i++;
                                  ?>
                                @endforeach
                              </table>
                          </div>

                          
                      </div>
                  </div>
                </div>

          </div>
 
<!-- Button trigger modal -->


<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="boletin" class="modal fade ">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb;">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Nuevo Descuento</h4>
            </div>

              
            <div class="modal-body">
        @include('alerts.request')
                {!!Form::open(['id'=>'form_Descuento','route'=>'Descuentos.store', 'method'=>'POST'])!!}
                    @include('Descuentos.form.descuentos')
                    <div id="submitAddDetalle">
                        <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:center">
                            <button type="button" class="boton boton-danger" data-dismiss="modal" style="width:100%"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar</button>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:center" >
                            <button type="submit" class="boton" style="width:100%"><i class="icon_floppy"></i> Registrar</button>
                        </div>
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
        {!!Html::script('js/Script_Descuento.js')!!}
    @endsection
@extends('layouts.principal')
@section('page-title', 'Partidas Trabajadas')

@section('titulo')  
    <h3 class="page-header"><i class="icon_building"></i>Partidas Trabajadas</h3>
@endsection
@section('lugar')
   <li><img alt="" src="{!!URL::asset('/img/icon_project_small.png')!!}" style="width: 15px"><a href="{!!URL::to('ProyectosUsuario/'.Auth::user()->id)!!}"> Proyectos</a></li>
    <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Contrato/'.$valuaciones->contrato->proyecto->id)!!}"> Opciones del Proyecto</a></li>
    <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Contrato/'.$valuaciones->contrato->proyecto->id)!!}"> Contratos</a></li>
    <li><i class="fa fa-gears"></i><a href="{!!URL::to('/OpcionesContrato/'.$valuaciones->contrato->id)!!}"> Opciones del Contrato</a></li>
   <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Boletines/'.$valuaciones->contrato->id)!!}"> Valuaciones </a></li>
   <li><i class="fa fa-gears"></i><a href="{!!URL::to('/OpcionesValuacion/'.$valuaciones->id)!!}">Opciones del Boletín</a></li>
   <li><i class="fa fa-gears"></i> Partidas Trabajadas</li>
@endsection
@section('accion')
@endsection

    @section('content')
    <?php  
        Session::put('valuacion',$valuaciones);

    ?>
      @if($sw == 0) 
          <input type="hidden" id="sw" value="0">
          

      @else
          <input type="hidden" id="sw" value="1">
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="detalleEdit" class="modal fade ">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb;">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">Editar Movimiento de Partida</h4>
                    </div>

                      
                    <div class="modal-body">
                        @include('alerts.request')
                        {!!Form::model($detalle,['id'=>'form_datalle', 'route'=>['DetallesValuacion.update',$detalle],'method'=>'PUT'])!!}
                            @include('ValuacionesDetalle.form.detalleValEdit')
                            <div id="submitAddDetalle_EDIT">
                                <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:center">
                                    <button type="button" class="boton boton-danger" data-dismiss="modal" style="width:100%"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar</button>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:center" >
                                    <button type="submit" class="boton" style="width:100%"><i class="icon_floppy"></i> Guardar</button>
                                </div>
                            </div>  
                            <div id="submitAddDetalleDisabel_EDIT">
                                <div class="col-lg-12 col-md-12 col-sm-12" style="text-align:center">
                                    <button type="button" class="boton boton-danger" data-dismiss="modal" style="width:100%"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar</button>
                                </div>
                            </div>
                            </div>
                        {!!Form::close()!!}



                    </div>
                </div>
            </div>
        </div>
      @endif

        @include('alerts.messages')
        @include('alerts.errors')
        @include('alerts.info')
        @include('alerts.warnings')
        <!-- page start-->
        <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="panel panel-primary">
                  <div class="panel-heading " style="background-color: #1a2732; color: #9cd5eb;">
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            Partidas Trabajadas 
                        </div>
                        <a href="{!!URL::to('/OpcionesValuacion/'.$valuaciones->id)!!}" >
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
                                  <p class="tam-12-5">{{strtoupper($valuaciones->contrato->proyecto->nombre_Proyecto)}}</p>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-3">
                                  <b class="tam-12-5">OBJETO DEL CONTRATO: </b>
                              </div>
                              <div class="col-lg-9 col-md-9 col-sm-9">
                                  <p class="tam-12-5">{{strtoupper($valuaciones->contrato->descripcion)}}</p>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-3" style="height: 28px;">
                                  <b class="tam-12-5">EMPRESA CLIENTE: </b>
                              </div>
                              <div class="col-lg-9 col-md-9 col-sm-9" style="height: 28px;">
                                <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center">
                                    <img src="{!!URL::asset('/archivos/'.$valuaciones->contrato->proyecto->empresa->logo)!!}" alt="" style="height: 25px;"/>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    {{$valuaciones->contrato->proyecto->empresa->nombre_Empresa}}
                                </div>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-3" style="height: 28px;">
                                  <b class="tam-12-5">EMPRESA CONTRATISTA: </b>
                              </div>
                              <div class="col-lg-9 col-md-9 col-sm-9" style="height: 28px;">
                                <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center">
                                    <img src="{!!URL::asset('/archivos/'.$valuaciones->contrato->empresaProveedor->logo)!!}" alt="" style="height: 25px"/>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    {{$valuaciones->contrato->empresaProveedor->nombre_Empresa}}
                                </div>
                              </div>
                          </div>
                          <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center">
                                <b class="tam-12-5">NRO DEL CONTRATO: </b><br>
                                {{$valuaciones->contrato->nro_Contrato}}<br><br>
                                <b class="tam-12-5">VALOR DEL CONTRATO: </b><br>
                                {{$valuaciones->contrato->moneda->symbol}} {{number_format($valorContrato, 2, ',', '.')}}
                          </div>
                          <div class="col-lg-12 col-md-12 col-sm-12"><br></div>
                          <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center">
                                <b class="tam-12-5">BOLETÍN: </b><br>
                                {{$valuaciones->nro_Boletin}}
                          </div>
                          <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center">
                                <b class="tam-12-5">VALUACIÓN: </b><br>
                                {{$valuaciones->nro_Valuacion}}
                          </div>
                          <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center">
                                <b class="tam-12-5">AV. FÍSICO: </b><br>
                                {{number_format($valuaciones->avance_fisico, 2, ',','.')}} %
                          </div>
                          <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center">
                                <b class="tam-12-5">AV. FINANCIERO: </b><br>
                                {{number_format($valuaciones->avance_financiero, 2, ',','.')}} %
                          </div>
                          <div class="col-lg-4 col-md-3 col-sm-3" style="text-align: center">
                                <b class="tam-12-5">PERÍODO: </b><br>
                                {{date('d-m-Y', strtotime($valuaciones->fecha_Inicio_Periodo))}} {{date('d-m-Y', strtotime($valuaciones->fecha_Fin_Periodo))}}
                          </div>

                      </div>  <!-- Fin Cabecera -->

                      <div class="col-lg-12 col-md-12 col-sm-12"><br><br></div>
                      <div class="col-lg-10 col-md-10 col-sm-10">
                          <h4 class="">Partidas Trabajadas</h4>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-2" style="padding-bottom: 10px">
                          <button type="button" class="boton tam-13" data-toggle="modal" data-target="#boletin" style="width: 100%; heigth: 80%">
                            Agregar Partida
                          </button>
                      </div>     
                      <div style="background-color: #688a7e; height: 16px" class="col-lg-12 col-md-12 col-sm-12"></div>
                      <div class="" >
                            <br>
                            <div class="presupuestos">
                              <table class="table" id="" class="display">
                                  <thead>
                                    <th>Nro de Partida</th>
                                    <th>Centro de Costo</th>
                                    <th>Cantidad Contratada</th>
                                    <th>Precio Unitario</th>
                                    <th>Precio Total</th>
                                    <th>Cantidades Anterior</th>
                                    <th>Cantidades Ejecutadas</th>
                                    <th>Cantidades Acumuladas</th>
                                    <th>Montos Anterior</th>                                    
                                    <th>Montos Ejecutados</th>                                    
                                    <th>Montos Acumulados</th>                                    
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
                                @foreach($detalleValuacion as $datos)
                                  <tbody>
                                    <td>{{$datos->partida->nro_Partida}}</td>
                                    @if($datos->cc_id != null)
                                        <td>{{$datos->cc->cod_CC}}</td>
                                    @else
                                        <td> - </td>
                                    @endif    
                                    <td>{{$datos->partida->cantidad}}</td>
                                    <td>{{$datos->partida->precio_Unitario}}</td>
                                    <td>{{$datos->partida->monto_Total}}</td>
                                    <?php
                                        $cantAnterior = $acumuladosPeriodo[$i]->CantidadAcumulada - $datos->cantidad_Realizada;
                                        $montoAnterior = $acumuladosPeriodo[$i]->MontoAcumulado - $datos->monto;
                                    ?>
                                    <td>{{$cantAnterior}}</td>
                                    <td>{{$datos->cantidad_Realizada}}</td>
                                    <td>{{$acumuladosPeriodo[$i]->CantidadAcumulada}}</td>
                                    <td>{{$montoAnterior}}</td>
                                    <td>{{$datos->monto}}</td>
                                    <td>{{$acumuladosPeriodo[$i]->MontoAcumulado}}</td>
                                    @if(Auth::user()->rol_Usuario == 'administrador')
                                      <td>
                                       {{$datos->user->nombre_Usuario}} {{$datos->user->apellido_Usuario}} | {{$datos->updated_at}}
                                      </td>
                                  @endif   
                                      @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
                                        <td class="col-lg-1 col-md-1" style="text-align: center">
                                            <div class="icon-reorder tooltips col-lg-6 col-md-6" data-original-title="Editar" data-placement="bottom" style="; text-align: center">
                                                <a href="{!!URL::to('/DetalleValuacion/'.$valuaciones->id.'/'.$datos->id)!!}" class="editarPartida" style="text-align: center;"  id="editardetalle_{{$datos->id}}">
                                                    <img alt="" src="{!!URL::asset('/img/icon_edit.png')!!}" style="height: 30px; width: 30px">
                                                </a>
                                            </div>
                                            <div class="icon-reorder tooltips col-lg-6 col-md-6" data-original-title="Eliminar" data-placement="bottom" style="; text-align: center">
                                                <a href="" data-toggle="modal" data-target="#Eliminar_{{$datos->id}}" style="text-align: center;"  id="editarPartida">
                                                    <img alt="" src="{!!URL::asset('/img/icon_delete.png')!!}" style="height: 30px; width: 30px">
                                                </a>
                                            </div>

                                            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Eliminar_{{$datos->id}}" class="modal fade ">
                                                <div class="modal-dialog " role="document">
                                                    <div class="modal-content">
                                                        <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb; text-align: left; height: 40px; padding-top: 6px">
                                                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                            <h4 class="modal-title">Eliminar Movimiento de Partida</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                          <strong>¿Está seguro que quiere Eliminar este movimiento de Partida?</strong> <br><br>
                                                          Al eliminarlo se verá afectado el estado de la valuación.<br><br>
                                                            <div class="col-lg-12 col-md-12 col-sm-12"><br></div>    
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:center">
                                                                <button type="button" class="boton boton-danger" data-dismiss="modal" style="width:100%"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar</button>
                                                            </div>
                                                            {!!Form::open(['route'=>['DetallesValuacion.destroy', $datos], 'method' => 'DELETE'])!!}
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

<input type="hidden" id="CantidadElementos_cantDisponible" value="{{sizeof($cantidadesDisponibles)}}">
  @if($sw == 0)
    <?php 
        $i = 0;
    ?> 
    @foreach($partidas as $partida)
        <input type="hidden" id="idPartida_{!!$partida->partida->id!!}"               value="{{$partida->partida->id}}"               class"idPartida">
        <input type="hidden" id="nroPartida_{!!$partida->partida->id!!}"              value="{{$partida->partida->nro_Partida}}"      class"nroPartida">
        <input type="hidden" id="descripcionPartida_{!!$partida->partida->id!!}"      value="{{$partida->descripcion}}"      class"descripcionPartida">
        <input type="hidden" id="unidadPartida_{!!$partida->partida->id!!}"           value="{{$partida->unidad}}"           class"unidadPartida">
        <input type="hidden" id="precioUnitarioPartida_{!!$partida->partida->id!!}"   value="{{$partida->partida->precio_Unitario}}"  class"precioUnitarioPartida">
        <input type="hidden" id="cantidadFaltantePartida_{!!$partida->partida->id!!}" value="{{$cantidadesDisponibles[$i]}}" class"cantidadFaltantePartida">
        <input type="hidden" id="montoFaltantePartida_{!!$partida->partida->id!!}"    value="{{$montosDisponibles[$i]}}"     class"montoFaltantePartida">
    <?php 
        $i++;
    ?>
    @endforeach
  @else
  <?php 
        $i = 0;
    ?> 
    @foreach($partidas as $partida)
        <input type="hidden" id="idPartida_{!!$partida->partida->id!!}"               value="{{$partida->partida->id}}"               class"idPartida">
        <input type="hidden" id="nroPartida_{!!$partida->partida->id!!}"              value="{{$partida->partida->nro_Partida}}"      class"nroPartida">
        <input type="hidden" id="descripcionPartida_{!!$partida->partida->id!!}"      value="{{$partida->descripcion}}"      class"descripcionPartida">
        <input type="hidden" id="unidadPartida_{!!$partida->partida->id!!}"           value="{{$partida->unidad}}"           class"unidadPartida">
        <input type="hidden" id="precioUnitarioPartida_{!!$partida->partida->id!!}"   value="{{$partida->partida->precio_Unitario}}"  class"precioUnitarioPartida">
        <input type="hidden" id="cantidadFaltantePartida_{!!$partida->partida->id!!}" value="{{$cantidadesDisponibles[$i]}}" class"cantidadFaltantePartida">
        <input type="hidden" id="montoFaltantePartida_{!!$partida->partida->id!!}"    value="{{$montosDisponibles[$i]}}"     class"montoFaltantePartida">
    <?php 
        $i++;
    ?>
    @endforeach  
    <?php 
        $i = 0;
    ?>
    @foreach($partidas as $partida)
        <input type="hidden" id="idPartida_{!!$partida->partida->id!!}_edit"               value="{{$partida->partida->id}}"               class"idPartida">
        <input type="hidden" id="nroPartida_{!!$partida->partida->id!!}_edit"              value="{{$partida->partida->nro_Partida}}"      class"nroPartida">
        <input type="hidden" id="descripcionPartida_{!!$partida->partida->id!!}_edit"      value="{{$partida->descripcion}}"      class"descripcionPartida">
        <input type="hidden" id="unidadPartida_{!!$partida->partida->id!!}_edit"           value="{{$partida->unidad}}"           class"unidadPartida">
        <input type="hidden" id="precioUnitarioPartida_{!!$partida->partida->id!!}_edit"   value="{{$partida->partida->precio_Unitario}}"  class"precioUnitarioPartida">
        
        @if($partida->partida_id == $detalle->partida_id)
            <?php 
                $cant = $cantidadesDisponibles[$i] + $detalle->cantidad_Realizada;
                $monto = $montosDisponibles[$i] + $detalle->monto;
            ?>
          <input type="hidden" id="Partida_actual_EDIT"   value="{{$detalle->partida_id}}" >
          <input type="hidden" id="cantidad_actual_EDIT"   value="{{$detalle->cantidad_Realizada}}" >

          <input type="hidden" id="cantidadFaltantePartida_{!!$partida->partida->id!!}_edit" value="{{$cant}}"    class"cantidadFaltantePartida">
          <input type="hidden" id="montoFaltantePartida_{!!$partida->partida->id!!}_edit"    value="{{$monto}}"   class"montoFaltantePartida">
        @else
          <input type="hidden" id="cantidadFaltantePartida_{!!$partida->partida->id!!}_edit" value="{{$cantidadesDisponibles[$i]}}" class"cantidadFaltantePartida">
          <input type="hidden" id="montoFaltantePartida_{!!$partida->partida->id!!}_edit"    value="{{$montosDisponibles[$i]}}"     class"montoFaltantePartida">
        @endif  
    <?php 
        $i++;
    ?>
    @endforeach
  @endif  
<!-- Button trigger modal -->


<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="boletin" class="modal fade ">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb;">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Nuevo Movimiento de Partida</h4>
            </div>

              
            <div class="modal-body">
        @include('alerts.request')
                {!!Form::open(['id'=>'form_datalle','route'=>'DetallesValuacion.store', 'method'=>'POST'])!!}
                    @include('ValuacionesDetalle.form.detalleVal')
                    <div id="submitAddDetalle">
                        <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:center">
                            <button type="button" class="boton boton-danger" data-dismiss="modal" style="width:100%"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar</button>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:center" >
                            <button type="submit" class="boton" style="width:100%"><i class="icon_floppy"></i> Registrar</button>
                        </div>
                    </div>  
                    <div id="submitAddDetalleDisabel">
                        <div class="col-lg-12 col-md-12 col-sm-12" style="text-align:center">
                            <button type="button" class="boton boton-danger" data-dismiss="modal" style="width:100%"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar</button>
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
        {!!Html::script('js/Script_DetalleValuacion.js')!!}
    @endsection

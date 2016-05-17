@extends('layouts.principal')
@section('page-title', 'Anticipos y Adelantos')

@section('titulo')  
    <h3 class="page-header"><i class="icon_building"></i>Anticipos y Adelantos</h3>
@endsection
@section('lugar')
    <li><img alt="" src="{!!URL::asset('/img/icon_project_small.png')!!}" style="width: 15px"><a href="{!!URL::to('ProyectosUsuario/'.Auth::user()->id)!!}"> Proyectos</a></li>
    <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Contrato/'.$valuacion->contrato->proyecto->id)!!}"> Opciones del Proyecto</a></li>
    <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Contrato/'.$valuacion->contrato->proyecto->id)!!}"> Contratos</a></li>
    <li><i class="fa fa-gears"></i><a href="{!!URL::to('/OpcionesContrato/'.$valuacion->contrato->id)!!}"> Opciones del Contrato</a></li>
   <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Boletines/'.$valuacion->contrato->id)!!}"> Valuaciones </a></li>
   <li><i class="fa fa-gears"></i><a href="{!!URL::to('/OpcionesValuacion/'.$valuacion->id)!!}">Opciones del Boletín</a></li>
   <li><i class="fa fa-gears"></i> Anticipos y Adelantos</li>
@endsection
@section('accion')
@endsection

    @section('content')


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
                            Anticipos y Adelantos 
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
                          <h4 class="">Anticipos y Adelantos</h4>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-2" style="padding-bottom: 10px">
                          <button type="button" class="boton tam-13" data-toggle="modal" data-target="#boletin" style="width: 100%; heigth: 80%">
                            Crear Adelanto
                          </button>
                      </div>   
                      <div style="background-color: #688a7e; height: 16px" class="col-lg-12 col-md-12 col-sm-12"></div>
                      <div class="" >
                            <br>
                            <div class="">
                              <table class="table" id="">
                                  <thead>
                                    <th>Concepto del Adelanto</th>
                                    <th>Porcentaje del Adelanto</th>
                                    <th>Monto del Adelanto</th>
                                    <th>Tipo de Adelanto</th>
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
                                @foreach($anticipos as $datos)
                                  <tbody>
                                    <td>{{$datos->concepto_Anticipo}}</td>
                                    <td>{{number_format($datos->porcentaje_Anticipo, 2, ',','.')}} %</td>
                                    <td>{{number_format($datos->monto_Anticipo, 2, ',','.')}}</td>
                                    @if($datos->tipo_Anticipo == 1)
                                        <td>Anticipo</td>
                                    @else    
                                        <td>Adelanto de Factura</td>
                                    @endif    
                                    @if(Auth::user()->rol_Usuario == 'administrador')
                                      <td>
                                       {{$datos->user->nombre_Usuario}} {{$datos->user->apellido_Usuario}} | {{$datos->updated_at}}
                                      </td>
                                  @endif   
                                      @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
                                        <td class="col-lg-1 col-md-1" style="text-align: center">
                                            <div class="icon-reorder tooltips col-lg-6 col-md-6" data-original-title="Editar" data-placement="bottom" style="; text-align: center">
                                                <a href="{!!URL::to('/Anticipo/'.$valuacion->id.'/'.$datos->id)!!}" class="editarPartida" style="text-align: center;"  id="editardetalle_{{$datos->id}}">
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
                                                            <h4 class="modal-title">Eliminar Adelanto</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                          <strong>¿Está seguro que quiere Eliminar este Adelanto?</strong> <br><br>
                                                          Al eliminarlo se verá afectado el estado de la valuación.<br><br>
                                                            <div class="col-lg-12 col-md-12 col-sm-12"><br></div>    
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:center">
                                                                <button type="button" class="boton boton-danger" data-dismiss="modal" style="width:100%"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar</button>
                                                            </div>
                                                            {!!Form::open(['route'=>['Anticipos.destroy', $datos], 'method' => 'DELETE'])!!}
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
 
<!-- Button trigger modal -->


<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="boletin" class="modal fade ">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb;">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Nuevo Adelanto</h4>
            </div>

              
            <div class="modal-body">
        @include('alerts.request')
                {!!Form::open(['id'=>'form_Anticipo','route'=>'Anticipos.store', 'method'=>'POST'])!!}
                    @include('Anticipos.form.anticipos')
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
        {!!Html::script('js/Script_Anticipo.js')!!}
    @endsection
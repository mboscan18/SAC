@extends('layouts.principal')
  @section('page-title', 'Información del Boletín')

@section('titulo')  
    <h3 class="page-header"><img alt="" src="{!!URL::asset('/img/icon_contrato.png')!!}" style="width: 39px"> Boletín</h3>
@endsection
@section('lugar')
    <li><img alt="" src="{!!URL::asset('/img/icon_project_small.png')!!}" style="width: 15px"><a href="{!!URL::to('ProyectosUsuario/'.Auth::user()->id)!!}"> Proyectos</a></li>
    <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Contrato/'.$valuacion->contrato->proyecto->id)!!}"> Opciones del Proyecto</a></li>
    <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Contrato/'.$valuacion->contrato->proyecto->id)!!}"> Contratos</a></li>
    <li><i class="fa fa-gears"></i><a href="{!!URL::to('/OpcionesContrato/'.$valuacion->contrato->id)!!}"> Opciones del Contrato</a></li>
   <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Boletines/'.$valuacion->contrato->id)!!}"> Valuaciones </a></li>
   <li><i class="fa fa-gears"></i><a href="{!!URL::to('/OpcionesValuacion/'.$valuacion->id)!!}">Opciones del Boletín</a></li>
   <li><i class="fa fa-pencil"></i> Información del Boletín</li>
@endsection

  @section('content')
      @include('alerts.request')
      @include('alerts.errors')
            <!-- page start-->
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb">
                        
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            Informacion del Boletín
                        </div>
                        <a href="{!!URL::to('/OpcionesValuacion/'.$valuacion->id)!!}" >
                          <div class="col-lg-4 col-md-4 col-sm-12 fa fa-arrow-left" style="text-align: right; padding-top: 10px;">
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

                      </div>  <!-- Fin Cabecera -->

                        <div class="col-lg-12 col-md-12 col-sm-12"><br></div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h4 class="">Informacion del Boletín</h4>
                        </div>   
                        <div style="background-color: #688a7e; height: 16px" class="col-lg-12 col-md-12 col-sm-12"></div>
                        <div class="col-lg-12 col-md-12 col-sm-12"><br></div> 
                        @if(true)
                            {!!Form::model($valuacion,['route'=>['Valuaciones.update',$valuacion],'method'=>'PUT'])!!}
                                @include('Valuaciones.form.valuacionesEdit')
                                   <div class="col-lg-6 col-md-6 col-sm-6 ">
                                    <button type="submit" class="boton" style="width:100%"><i class="icon_floppy"></i> Guardar</button>
                                  </div>
                            {!!Form::close()!!}
                            <div class="col-lg-6 col-md-6 col-sm-6 ">
                            <button  data-toggle="modal" data-target="#Eliminar" class="boton boton-danger" style="width:100%"><i class="fa fa-trash-o fa-lg"></i> Eliminar</button>
                          
                            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Eliminar" class="modal fade ">
                                <div class="modal-dialog " role="document">
                                    <div class="modal-content">
                                        <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb; text-align: left; height: 40px; padding-top: 6px">
                                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                            <h4 class="modal-title">Eliminar Boletín</h4>
                                        </div>
                                        <div class="modal-body">
                                          <strong>¿Está seguro que quiere Eliminar el Boletín?</strong> <br><br>
                                          Al eliminar el Boletín se eliminrán también los elementos incluidos en el mismo: <br><br>
                                          &nbsp; &nbsp; &nbsp; &nbsp; - Anticipos y Adelantos<br>
                                          &nbsp; &nbsp; &nbsp; &nbsp; - Movimiento de Partidas<br>
                                          &nbsp; &nbsp; &nbsp; &nbsp; - Amortizaciones y Descuentos<br>
                                            <div class="col-lg-12 col-md-12 col-sm-12"><br></div>    
                                        </div>
                                        <div class="modal-footer">
                                            <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:center">
                                                <button type="button" class="boton boton-danger" data-dismiss="modal" style="width:100%"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar</button>
                                            </div>
                                            {!!Form::open(['route'=>['Valuaciones.destroy', $valuacion], 'method' => 'DELETE'])!!}
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
                        @else
                            <div class="row col-lg-6 col-md-6 col-sm-6">
                              <div class="form-group col-lg-12 col-md-12 col-sm-12 round-input">
                                {!!Form::label('num','Numero de Contrato:')!!}<br>
                                {!!Form::label('nro_Contrato',$contratos->nro_Contrato)!!}
                              </div>
                              <div class="form-group col-lg-12 col-md-12 col-sm-12 round-input">
                                {!!Form::label('cc','Empresa Contratista:')!!}<br>
                                {!!Form::label('empresa_Proveedor',$contratos->empresaProveedor->nombre_Empresa)!!}
                              </div>
                            </div>
                            <div class="row col-lg-6 col-md-6 col-sm-6">
                              <div class="form-group col-lg-12 col-md-12 col-sm-12 round-input">
                                {!!Form::label('num','Moneda del Contrato:')!!}<br>
                                {!!Form::label('num',$contratos->moneda->country.' ('.$contratos->moneda->symbol.')')!!}
                              </div>
                              <div class="form-group col-lg-12 col-md-12 col-sm-12 round-input">
                                {!!Form::label('fecha_presupuesto','Fecha de firma de la Orden de Servicio:')!!}<br>
                                {!!Form::label('fecha_presupuesto',date('d-m-Y', strtotime($contratos->fecha_firma)))!!}
                              </div>
                            </div>
                            <div class="row col-lg-6 col-md-6 col-sm-6">
                              <div class="form-group col-lg-12 col-md-12 col-sm-12 round-input">
                                {!!Form::label('fecha_ini','Fecha Inicio Contrato:')!!}<br>
                                {!!Form::label('fecha_presupuesto',date('d-m-Y', strtotime($contratos->fecha_inicio)))!!}
                              </div>
                              <div class="form-group col-lg-12 col-md-12 col-sm-12 round-input">
                                {!!Form::label('fecha_fin','Fecha Fin Contrato:')!!}<br>
                                {!!Form::label('fecha_presupuesto',date('d-m-Y', strtotime($contratos->fecha_fin)))!!}
                              </div>
                            </div>
                            <div class="row col-lg-6 col-md-6 col-sm-6">
                              <div class="form-group col-lg-12 col-md-12 col-sm-12 round-input">
                                {!!Form::label('estado','Estado del Contrato:')!!}<br>
                                {!!Form::label('estado',$contratos->estado_Contrato)!!}
                              </div>
                              <div class="form-group col-lg-12 col-md-12 col-sm-12 round-input">
                                {!!Form::label('num','Descripción del Contrato:')!!}<br>
                                {!!Form::label('num',$contratos->descripcion)!!}
                              </div>
                            </div>
                            <div class="row col-lg-12 col-md-12 col-sm-12">
                              <div class="form-group col-lg-12 col-md-12 col-sm-12 round-input">
                                {!!Form::label('num','Observaciones del Contrato')!!}<br>
                                {!!Form::label('num',$contratos->observaciones)!!}
                              </div>
                            </div>
                            <br>
                            <div class="row col-lg-12 col-md-12 col-sm-12">

                                <div class="col-lg-3 col-md-3 col-sm-3"></div>
                                <div class="col-lg-6 col-md-6 col-sm-6 ">
                                  <a href="{!!URL::to('/OpcionesContrato/'.$contratos->id)!!}"  class="boton  col-lg-6 col-md-6 col-sm-6" style="width:100%; text-align: center">
                                    <i class="fa fa-arrow-left fa-lg"></i> Volver a Opciones del Contrato
                                  </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
              </div>
            <!-- page end-->
@endsection
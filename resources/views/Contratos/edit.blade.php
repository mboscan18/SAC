@extends('layouts.principal')
  @section('page-title', 'Informacion del Contrato')

@section('titulo')  
    <h3 class="page-header"><img alt="" src="{!!URL::asset('/img/icon_contrato.png')!!}" style="width: 39px"> Contratos</h3>
@endsection
@section('lugar')
    </li><li><img alt="" src="{!!URL::asset('/img/icon_project_small.png')!!}" style="width: 15px"><a href="{!!URL::to('ProyectosUsuario/'.Auth::user()->id)!!}"> Proyectos</a></li>
    <li><i class="fa fa-gears"></i> <a href="{!!URL::to('OpcionesProyecto/'.$contratos->proyecto->id)!!}"> Opciones del Proyecto</a></li>
   <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Contrato/'.$contratos->proyecto->id)!!}"> Contratos</a></li>
    <li><i class="fa fa-gears"></i><a href="{!!URL::to('/OpcionesContrato/'.$contratos->id)!!}"> Opciones del Contrato</a></li>
    <li><i class="fa fa-pencil"></i> Informacion del Contrato</li>
@endsection

  @section('content')
      @include('alerts.request')
      @include('alerts.errors')
            <!-- page start-->
              <div class="col-lg-1"></div>
              <div class="col-lg-10 col-md-10 col-sm-10">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb">
                        
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            Informacion del Contrato
                        </div>
                        <a href="{!!URL::to('/OpcionesContrato/'.$contratos->id)!!}" >
                          <div class="col-lg-4 col-md-4 col-sm-12 fa fa-arrow-left" style="text-align: right; padding-top: 10px;">
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
                                    <p class="tam-12-5">{{strtoupper($contratos->proyecto->nombre_Proyecto)}}</p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3" style="height: 28px;">
                                    <b class="tam-12-5">EMPRESA CLIENTE: </b>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9" style="height: 28px;">
                                  <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center">
                                      <img src="{!!URL::asset('/archivos/'.$contratos->proyecto->empresa->logo)!!}" alt="" style="height: 25px;"/>
                                  </div>
                                  <div class="col-lg-10 col-md-10 col-sm-10">
                                      {{$contratos->proyecto->empresa->nombre_Empresa}}
                                  </div>
                                </div>
                            </div>
                        </div>  <!-- Fin Cabecera -->

                        <div class="col-lg-12 col-md-12 col-sm-12"><br></div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h4 class="">Informacion del Contrato</h4>
                        </div>   
                        <div style="background-color: #688a7e; height: 16px" class="col-lg-12 col-md-12 col-sm-12"></div>
                        <div class="col-lg-12 col-md-12 col-sm-12"><br></div> 
                        @if($nroAdendum == -1)
                            {!!Form::model($contratos,['route'=>['Contratos.update',$contratos],'method'=>'PUT'])!!}
                                @include('Contratos.form.contratos')
                                   <div class="col-lg-6 col-md-6 col-sm-6 ">
                                    <button type="submit" class="boton" style="width:100%"><i class="icon_floppy"></i> Guardar</button>
                                  </div>
                            {!!Form::close()!!}
                            <div class="col-lg-6 col-md-6 col-sm-6 ">
                            {!!Form::open(['route'=>['Contratos.destroy', $contratos], 'method' => 'DELETE'])!!}
                              <button type="submit" class="boton boton-danger" style="width:100%"><i class="fa fa-trash-o fa-lg"></i> Eliminar</button>
                            {!!Form::close()!!}
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
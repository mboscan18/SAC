@extends('layouts.principal')
@section('page-title', 'Firmas del Contrato')

@section('titulo')  
    <h3 class="page-header"><i class="icon_building"></i>Firmas del Contrato</h3>
@endsection
@section('lugar')
    </li><li><img alt="" src="{!!URL::asset('/img/icon_project_small.png')!!}" style="width: 15px"><a href="{!!URL::to('ProyectosUsuario/'.Auth::user()->id)!!}"> Proyectos</a></li>
    <li><i class="fa fa-gears"></i> <a href="{!!URL::to('OpcionesProyecto/'.$contrato->proyecto->id)!!}"> Opciones del Proyecto</a></li>
    <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Contrato/'.$contrato->proyecto->id)!!}"> Contratos</a></li>
    <li><i class="fa fa-gears"></i><a href="{!!URL::to('/OpcionesContrato/'.$contrato->id)!!}"> Opciones del Contrato</a></li>
     <li><i class="fa fa-edit"></i> Firmas del Contrato</li>

@endsection
@section('accion')
@endsection

     
    @section('content')
    <?php
      Session::put('idContrato',$contrato->id);
    ?> 
        @include('alerts.warnings')
        @include('alerts.messages')
        @include('alerts.errors')
        <!-- page start-->
        <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="panel panel-primary">
                  <div class="panel-heading " style="background-color: #1a2732; color: #9cd5eb;">
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            Firmas del Contrato
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
                          <h4 class="">
                            @if( (($cant_MAX_OS - $nroFirmantes_OS[0]) <= 0) && (($cant_MAX_OS - $nroFirmantes_OS[1]) <= 0))
                            @else  
                              <a class="icon-reorder tooltips icon-link" data-original-title="Agregar Firmante" data-placement="bottom" type="button" href="" data-toggle="modal" data-target="#firmantesOrdenServicio" style="text-align: center; heigth: 80%">
                                <i class="fa fa-plus fa-lg" ></i>
                              </a> 
                            @endif  
                              &nbsp; &nbsp;Firmantes Sobre Las Ordenes de Servicio
                          </h4>
                      </div>   
                      <div style="background-color: #688a7e; height: 16px" class="col-lg-12 col-md-12 col-sm-12"></div>
                      <div class="col-lg-12 col-md-12 col-sm-12"><br></div>

                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="col-lg-12 col-md-12 col-sm-12" style="text-align: center">
                            <h4>Firmantes por Empresa Cliente</h4>
                        </div> 
                        
                        <table class="table " id="" style="">
                            <thead>
                              <th >Accion</th>
                              <th >Nombre del Firmante</th>
                              <th></th>
                            </thead>
                          @foreach($firmantes_cliente_OS as $datos)
                            <tbody> 
                              <td>{{$datos->accion}}</td>
                              <td>{{$datos->firmante->nombre}} {{$datos->firmante->apellido}}</td>
                              @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
                                  <td  style="text-align: center">
                                      <div class="icon-reorder tooltips" data-original-title="Eliminar" data-placement="right" style="; text-align: center">
                                        {!!Form::open(['route'=>['FirmasOrdenServicio.destroy', $datos], 'method' => 'DELETE'])!!}
                                            <button href="" type="submit" class="boton-transparent" style="text-align: center;">
                                              <img  alt="" src="{!!URL::asset('/img/icon_delete.png')!!}" style="height: 30px; width: 30px">
                                          </button>
                                          {!!Form::close()!!}
                                      </div>
                                </td>
                              @endif 
                            </tbody>
                          @endforeach
                        </table>
                      <div class="col-lg-12 col-md-12 col-sm-12" style="text-align: center">
                          <h5>Firmantes Disponibles {{$cant_MAX_OS - $nroFirmantes_OS[0]}}</h5>
                      </div>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="col-lg-12 col-md-12 col-sm-12" style="text-align: center">
                            <h4>Firmantes por Empresa Contratista</h4>
                        </div> 
                        
                        <table class="table " id="" style="">
                            <thead>
                              <th >Accion</th>
                              <th >Nombre del Firmante</th>
                              <th></th>
                            </thead>
                          @foreach($firmantes_proveedor_OS as $datos)
                            <tbody> 
                              <td>{{$datos->accion}}</td>
                              <td>{{$datos->firmante->nombre}} {{$datos->firmante->apellido}}</td>
                              @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
                                  <td  style="text-align: center">
                                      <div class="icon-reorder tooltips" data-original-title="Eliminar" data-placement="right" style="; text-align: center">
                                        {!!Form::open(['route'=>['FirmasOrdenServicio.destroy', $datos], 'method' => 'DELETE'])!!}
                                            <button href="" type="submit" class="boton-transparent" style="text-align: center;">
                                              <img  alt="" src="{!!URL::asset('/img/icon_delete.png')!!}" style="height: 30px; width: 30px">
                                          </button>
                                          {!!Form::close()!!}
                                      </div>
                                </td>
                              @endif 
                            </tbody>
                          @endforeach
                        </table>
                      <div class="col-lg-12 col-md-12 col-sm-12" style="text-align: center">
                          <h5>Firmantes Disponibles {{$cant_MAX_OS - $nroFirmantes_OS[1]}}</h5>
                      </div>
                      </div>

                      <div class="col-lg-12 col-md-12 col-sm-12"><br><br></div>
                      <div class="col-lg-12 col-md-12 col-sm-12">
                          <h4 class="">
                             
                               @if( (($cant_MAX_VAL - $nroFirmantes_VAL[0]) <= 0) && (($cant_MAX_OS - $nroFirmantes_OS[1]) <= 0))
                            @else  
                               <a class="icon-reorder tooltips icon-link" data-original-title="Agregar Firmante" data-placement="bottom" type="button" href="" data-toggle="modal" data-target="#firmantesValucion" style="text-align: center; heigth: 80%">
                                <i class="fa fa-plus fa-lg" ></i>
                              </a>  
                            @endif 
                              &nbsp; &nbsp;Firmantes Sobre Las Valuaciones
                            </h4>
                      </div>   
                      <div style="background-color: #688a7e; height: 16px" class="col-lg-12 col-md-12 col-sm-12"></div>
                      <div class="col-lg-12 col-md-12 col-sm-12"><br></div>


                      <div class=" col-lg-6 col-md-6 col-sm-6">
                        <div class="col-lg-12 col-md-12 col-sm-12" style="text-align: center">
                            <h4>Firmantes por Empresa Cliente</h4>
                        </div> 
                        
                        <table class="table " id="" style="">
                            <thead>
                              <th >Accion</th>
                              <th >Nombre del Firmante</th>
                              <th></th> 
                            </thead>
                          @foreach($firmantes_cliente_VAL as $datos)
                            <tbody> 
                              <td>{{$datos->accion}}</td>
                              <td>{{$datos->firmante->nombre}} {{$datos->firmante->apellido}}</td>
                              @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
                                  <td  style="text-align: center">
                                      <div class="icon-reorder tooltips" data-original-title="Eliminar" data-placement="right" style="; text-align: center">
                                          {!!Form::open(['route'=>['FirmasValuacion.destroy', $datos], 'method' => 'DELETE'])!!}
                                            <button href="" type="submit" class="boton-transparent" style="text-align: center;">
                                              <img alt="" src="{!!URL::asset('/img/icon_delete.png')!!}" style="height: 30px; width: 30px">
                                            </button>
                                          {!!Form::close()!!}
                                      </div>
                                </td>
                              @endif
                            </tbody>
                          @endforeach
                        </table>
                      </div>

                  <div class=" col-lg-6 col-md-6 col-sm-6">
                        <div class="col-lg-12 col-md-12 col-sm-12" style="text-align: center">
                            <h4>Firmantes por Empresa Contratista</h4>
                        </div> 
                        
                        <table class="table " id="" style="">
                            <thead>
                              <th >Accion</th>
                              <th >Nombre del Firmante</th>
                              <th></th> 
                            </thead>
                          @foreach($firmantes_proveedor_VAL as $datos)
                            <tbody> 
                              <td>{{$datos->accion}}</td>
                              <td>{{$datos->firmante->nombre}} {{$datos->firmante->apellido}}</td>
                              @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
                                  <td  style="text-align: center">
                                      <div class="icon-reorder tooltips" data-original-title="Eliminar" data-placement="right" style="; text-align: center">
                                          {!!Form::open(['route'=>['FirmasValuacion.destroy', $datos], 'method' => 'DELETE'])!!}
                                            <button href="" type="submit" class="boton-transparent" style="text-align: center;">
                                              <img alt="" src="{!!URL::asset('/img/icon_delete.png')!!}" style="height: 30px; width: 30px">
                                            </button>
                                          {!!Form::close()!!}
                                      </div>
                                </td>
                              @endif
                            </tbody>
                          @endforeach
                        </table>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12" style="text-align: center">
                          <h5>Firmantes Disponibles {{$cant_MAX_VAL - $nroFirmantes_OS[0]}}</h5>
                      </div>

                    </div>
                  </div>
              </div>


 
<!-- Button trigger modal -->

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="firmantesOrdenServicio" class="modal fade ">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb;">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Agregar Firmante Sobre Orden de Servicio</h4>
            </div>
            <div class="modal-body">
              {!!Form::open(['id'=>'','route'=>'FirmasOrdenServicio.store', 'method'=>'POST'])!!}
                    @include('Firmantes.form.firmantesOrdenServicio')
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

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="firmantesValucion" class="modal fade ">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb;">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Agregar Firmante Sobre Valuacion</h4>
            </div>
            <div class="modal-body">
              {!!Form::open(['id'=>'','route'=>'FirmasValuacion.store', 'method'=>'POST'])!!}
                    @include('Firmantes.form.firmantesValuacion')
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
    @endsection
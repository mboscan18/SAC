@extends('layouts.principal')
@section('page-title', 'Adendum - Editar Partida')

@section('titulo')  
    <h3 class="page-header"><i class="icon_documents"></i>Adendum</h3>
@endsection
@section('lugar')
    </li><li><img alt="" src="{!!URL::asset('/img/icon_project_small.png')!!}" style="width: 15px"><a href="{!!URL::to('ProyectosUsuario/'.Auth::user()->id)!!}"> Proyectos</a></li>
    <li><i class="fa fa-gears"></i> <a href="{!!URL::to('OpcionesProyecto/'.$contrato->proyecto->id)!!}"> Opciones del Proyecto</a></li>
  <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Contrato/'.$contrato->proyecto->id)!!}"> Contratos </a></li>
   <li><i class="fa fa-gears"></i><a href="{!!URL::to('/OpcionesContrato/'.$contrato->id)!!}"> Opciones del Contrato</a></li>
   <li><i class="fa fa-gears"></i><a href="{!!URL::to('/Adendum/'.$contrato->id)!!}"> Adendum</a></li>
    <li><i class="fa fa-pencil"></i> Editar Partida</li>
@endsection

    @section('content')
              @include('alerts.request')


            <!-- page start-->
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb;">
                      <div class="col-lg-9 col-md-9 col-sm-12">
                            Adendum - Editar Partida 
                        </div>
                        <a href="{!!URL::to('/Adendum/'.$contrato->id)!!}" >
                          <div class="col-lg-3 col-md-3 col-sm-12 fa fa-arrow-left" style="text-align: right; padding-top: 10px">
                             Volver a Opciones del Adendum 
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
                          <h4 class="">Editar Partida</h4>
                      </div>   
                      <div style="background-color: #688a7e; height: 16px" class="col-lg-12 col-md-12 col-sm-12"></div>
                      <div class="col-lg-12 col-md-12 col-sm-12"><br></div>


<input type="hidden" id="CantidadElementos_cantTrabajada" value="{{sizeof($cantidadesTrabajadas)}}">
<?php 
    $i=0;
?>
@foreach($partidas as $partida)
    <input type="hidden" id="idPartida_{!!$i!!}"               value="{{$partida->id}}"               >
    <input type="hidden" id="nroPartida_{!!$partida->id!!}"              value="{{$partida->nro_Partida}}"      >
    <input type="hidden" id="descripcionPartida_{!!$partida->id!!}"      value="{{$partida->descripcion}}"      >
    <input type="hidden" id="unidadPartida_{!!$partida->id!!}"           value="{{$partida->unidad}}"           >
    <input type="hidden" id="cantidadPartida_{!!$partida->id!!}"         value="{{$partida->cantidad}}"         >
    <input type="hidden" id="precioUnitarioPartida_{!!$partida->id!!}"   value="{{$partida->precio_Unitario}}"  >
    <input type="hidden" id="montoPartida_{!!$partida->id!!}"            value="{{$partida->monto_Total}}"  >
    <input type="hidden" id="cantidadTrabajada_{!!$partida->id!!}"       value="{{$cantidadesTrabajadas[$i]}}"  >
    <?php 
        $i++; 
    ?>
@endforeach 
                      {!!Form::model($partidas,['route'=>['AdendumPresupuestos.update',$contrato],'method'=>'PUT'])!!}
                          @include('Adendum.form.partida')
                            <div class="col-lg-12 col-md-12 col-sm-12"><br></div>

                             <div class="col-lg-6 col-md-6 col-sm-6 ">
                              <button type="submit" class="boton" style="width:100%"><i class="icon_floppy"></i> Guardar</button>
                            </div>
                      {!!Form::close()!!}
                      <div class="col-lg-6 col-md-6 col-sm-6 ">
                        <a href="{!!URL::to('/Adendum/'.$contrato->id)!!}"  class="boton boton-danger col-lg-6 col-md-6 col-sm-6" style="width:100%; text-align: center">
                          <i class="fa fa-arrow-left fa-lg"></i> Volver al Adendum
                        </a>
                      </div>
                    </div>
                </div>
              </div>
            <!-- page end-->
    @endsection

    @section('scripts')
        {!!Html::script('js/Script_AdendumEditarPartida.js')!!}
    @endsection

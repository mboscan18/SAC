@extends('layouts.principal')
@section('page-title', 'Presupuesto')

@section('titulo')  
    <h3 class="page-header"><i class="icon_building"></i>Presupuesto</h3>
@endsection
@section('lugar')
   </li><li><img alt="" src="{!!URL::asset('/img/icon_project_small.png')!!}" style="width: 15px"><a href="{!!URL::to('ProyectosUsuario/'.Auth::user()->id)!!}"> Proyectos</a></li>
    <li><i class="fa fa-gears"></i> <a href="{!!URL::to('OpcionesProyecto/'.$contratos->proyecto->id)!!}"> Opciones del Proyecto</a></li>
  <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Contrato/'.$contratos->proyecto->id)!!}"> Contratos </a></li>
   <li><i class="fa fa-gears"></i><a href="{!!URL::to('/OpcionesContrato/'.$contratos->id)!!}"> Opciones del Contrato</a></li>
   <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"> Presupuesto </li>
@endsection
@section('accion')
@endsection

    @section('content')

    @if($sw == 0) 
        <input type="hidden" id="sw" value="0">
        @include('alerts.request')

    @else
        @if($nroAdendum == -1)
            <input type="hidden" id="sw" value="1">
            <div id="bingo">
              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editarPartida" class="modal fade ">
                  <div class="modal-dialog " role="document">
                      <div class="modal-content">
                          <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb;">
                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                              <h4 class="modal-title">Editar Partida</h4>
                          </div>
                          <div class="modal-body">
                            @include('alerts.request')
                              {!!Form::model($partida,['id'=>'form_partida', 'route'=>['Presupuestos.update',$partida],'method'=>'PUT'])!!}
                                  @include('Presupuestos.form.partidaedit')
                                    <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:center">
                                        <button type="button" class="boton boton-danger" data-dismiss="modal" style="width:100%"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar</button>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:center">
                                        <button type="submit" class="boton" style="width:100%"><i class="icon_floppy"></i> Guardar</button>
                                    </div>
                                  </div>
                              {!!Form::close()!!}
                          </div>
                      </div>
                  </div>
              </div>
              </div>
        @endif
    @endif

        @include('alerts.messages')
        @include('alerts.errors')
        <?php
          Session::put('contrato',$contratos);
        ?> 
        <!-- page start-->
        <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="panel panel-primary">
                  <div class="panel-heading " style="background-color: #1a2732; color: #9cd5eb;">
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            Presupuesto del Contrato
                        </div>
                        <a href="{!!URL::to('/OpcionesContrato/'.$contratos->id)!!}" >
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
                                  <p class="tam-12-5">{{strtoupper($contratos->proyecto->nombre_Proyecto)}}</p>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-3">
                                  <b class="tam-12-5">OBJETO DEL CONTRATO: </b>
                              </div>
                              <div class="col-lg-9 col-md-9 col-sm-9">
                                  <p class="tam-12-5">{{strtoupper($contratos->descripcion)}}</p>
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
                              <div class="col-lg-3 col-md-3 col-sm-3" style="height: 28px;">
                                  <b class="tam-12-5">EMPRESA CONTRATISTA: </b>
                              </div>
                              <div class="col-lg-9 col-md-9 col-sm-9" style="height: 28px;">
                                <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center">
                                    <img src="{!!URL::asset('/archivos/'.$contratos->empresaProveedor->logo)!!}" alt="" style="height: 25px"/>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    {{$contratos->empresaProveedor->nombre_Empresa}}
                                </div>
                              </div>
                          </div>
                          <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center">
                                <b class="tam-12-5">NRO DEL CONTRATO: </b><br>
                                {{$contratos->nro_Contrato}}<br><br>
                                <b class="tam-12-5">VALOR DEL CONTRATO: </b><br>
                                {{$contratos->moneda->symbol}} {{number_format($valorContrato, 2, ',', '.')}}
                          </div>
                      </div>  <!-- Fin Cabecera -->

                      <div class="col-lg-12 col-md-12 col-sm-12"><br><br></div>
                      @if($nroAdendum == -1)
                          <div class="col-lg-11 col-md-11 col-sm-11"></div>
                          <div class="col-lg-1 col-md-1 col-sm-1" style="padding-bottom: 10px">
                              <button id="botonAddPartida" type="button" class="boton boton-transparent icon-reorder tooltips" data-toggle="collapse" data-target="#agregarPartida" aria-expanded="false" aria-controls="agregarPartida" data-original-title="Agregar Partida" data-placement="bottom" style="width: 100%; color: #688a7e">
                                <i class="fa fa-eye fa-2x"></i>
                              </button>
                          </div>

                          <div>
                              <div class="collapse col-lg-12 col-md-12 col-sm-12" id="agregarPartida">
                                <div class="well">
                                    {!!Form::open(['id'=>'form_partida', 'route'=>'Presupuestos.store', 'method'=>'POST'])!!}
                                        @include('Presupuestos.form.partida')
                                          <div class="col-lg-3 col-md-3 col-sm-3"></div>
                                          <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:center">
                                              <button type="submit" class="boton" style="width:100%"><i class="icon_floppy"></i> Registrar</button>
                                          </div>
                                    {!!Form::close()!!}
                                </div>
                              </div>
                          </div>
                      @endif    
                  <div>
                      <div class="col-lg-12 col-md-12 col-sm-12"><br></div>
                      <div class="col-lg-10 col-md-10 col-sm-10">
                          <h4 class="">Detalle de Presupuesto</h4>
                      </div>
                      <div style="background-color: #688a7e; height: 16px" class="col-lg-12 col-md-12 col-sm-12"></div>
                      <div class="col-lg-12 col-md-12 col-sm-12"><br><br></div>

                      <div class="" >
                            <br>
                            <div class="presupuestos">
                              <table class="table" id="table_presupuesto" >
                                    <thead>
                                      <th>Nro Partida</th>
                                      <th>Descripcion</th>
                                      <th>Unidad</th>
                                      <th>Cantidad</th>
                                      <th>Precio Unit.</th>
                                      <th>Monto Total</th>
                                      @if(Auth::user()->rol_Usuario == 'administrador')
                                          <th>Ultima Modificacion</th>
                                      @endif 
                                      @if(((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente')) && ($nroAdendum == -1))
                                          <th>Operacion</th>
                                      @endif    
                                    </thead>
                                      <tbody>
                                    @foreach($partidas as $datos)
                                      <tr>
                                        <td id="partida_">{{$datos->nro_Partida}}</td>
                                        <td>{{$datos->descripcion}}</td>
                                        <td>{{$datos->unidad}}</td>
                                        <td>{{number_format($datos->cantidad, 2, ',', '.')}}</td>
                                        <td>{{number_format($datos->precio_Unitario, 2, ',', '.')}}</td>
                                        <td>{{number_format($datos->monto_Total, 2, ',', '.')}}</td>
                                        @if(Auth::user()->rol_Usuario == 'administrador')
                                            <td>
                                                {{$datos->user->nombre_Usuario}} {{$datos->user->apellido_Usuario}} | {{$datos->updated_at->format('d-m-Y, g:ia')}}
                                            </td>
                                        @endif   
                                        @if(((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente')) && ($nroAdendum == -1))
                                              <td class="col-lg-1 col-md-1" style="text-align: center">
                                                <div class="icon-reorder tooltips col-lg-6 col-md-6" data-original-title="Editar" data-placement="bottom" style="; text-align: center">
                                                    <a href="{!!URL::to('/Presupuesto/'.$contratos->id.'/'.$datos->id.'/editar')!!}" class="editarPartida" style="text-align: center;"  id="editarPartida">
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
                                                                <h4 class="modal-title">Eliminar Partida</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                              <strong>¿Está seguro que quiere Eliminar la Partida?</strong> <br><br>
                                                              Las partidas eliminadas no podrán ser trabajadas.<br><br>
                                                                <div class="col-lg-12 col-md-12 col-sm-12"><br></div>    
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:center">
                                                                    <button type="button" class="boton boton-danger" data-dismiss="modal" style="width:100%"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar</button>
                                                                </div>
                                                                {!!Form::open(['route'=>['Presupuestos.destroy', $datos], 'method' => 'DELETE'])!!}
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
                                      </tr>
                                    @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
                  </div>
                </div>

          </div>

          
<!-- Button trigger modal -->


   <script type="text/javascript">
        var list = document.getElementsByClassName("editarPartida");
        for (var i = 0; i < list.length; i++) {
          list[i].setAttribute("id", "editarPartida_" + i);
        }

   </script> 




            <!-- page end-->
    
    @endsection
    @section('scripts')
        {!!Html::script('js/Script_Presupuesto.js')!!}
    @endsection


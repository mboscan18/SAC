@extends('layouts.principal')
@section('page-title', 'Presupuestos')

@section('titulo')  
    <h3 class="page-header"><i class="icon_building"></i>Presupuestos</h3>
@endsection
@section('lugar')
   <li><i class="icon_building"></i> Presupuestos</li>
@endsection
@section('accion')
@endsection

    @section('content')
        @include('alerts.messages')
        @include('alerts.errors')
        <!-- page start-->
        <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center;">
            <div class="icon-reorder tooltips col-lg-1 col-md-1 col-sm-1" data-original-title="Exportar a Excel" data-placement="bottom" style="height: 45px; width: 30%">
                <a href="" class="" style="text-align: right; ">
                    <img alt="" src="{!!URL::asset('/img/icon_excel.png')!!}" style="height: 45px; width: 45px">
                </a>
            </div>
            <div class="icon-reorder tooltips col-lg-1 col-md-1 col-sm-1" data-original-title="Exportar a PDF" data-placement="bottom" style="height: 45px; width: 30%">
                <a href="" class="" style="text-align: right; ">
                    <img alt="" src="{!!URL::asset('/img/icon_pdf.png')!!}" style="height: 45px; width: 45px">
                </a>
            </div>
          </div>
          @if(Auth::user()->rol_Usuario == 'administrador')
              <div class="col-lg-8 col-md-8 col-sm-8"> </div>
                <div class="icon-reorder tooltips col-lg-1 col-md-1 col-sm-1" data-original-title="Mostrar Empresas Eliminadas" data-placement="bottom" style="height: 45px; text-align: right">
                    <a href="{!!URL::to('EmpresasDeleted')!!}" class="" style="text-align: right; ">
                        <img alt="" src="{!!URL::asset('/img/icon_datosEliminados.png')!!}" style="height: 45px; width: 45px">
                    </a>
                </div>  
          @endif      
          <br><br><br>
          <div class="col-lg-1 col-md-1 col-sm-1"></div>
          <div class="col-lg-10 col-md-10 col-sm-10">
            <div class="panel panel-primary">
                <div class="panel-heading " style="background-color: #1a2732; color: #9cd5eb">Presupuestos</div>
                <div class="panel-body" >

                    <style type="text/css">
                        option.estilo {color: #34aadc}
                    </style>
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 round-input">
                        {!!Form::label('contratos','Contratos:')!!}
                        <select class="form-control" name="contratosPresupuestos" id="contratosPresupuestos">
                                <option  value=null>Seleccione un Contrato</option>
                                @foreach($contratos as $option)
                                    <option  value="{{$option->id}}">
                                        <p>Contrato nro: {{$option->nro_Contrato}} <br/>
                                            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Empresa Proveedor: {{$option->empresaProveedor->nombre_Empresa}} 
                                            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Empresa Cliente: {{$option->empresaCliente->nombre_Empresa}}
                                        </p>
                                    </option>
                                @endforeach
                            </select>
                        
                    </div>
                    <br><br><br><br>

                      <div class="presupuestos">
                        <table class="table" id="table_empresas" class="display">
                              <thead>
                                <th>Nro Partida</th>
                                <th>Codigo</th>
                                <th>Cod Covenin</th>
                                <th>Descripcion</th>
                                <th>Cantidad</th>
                                <th>Monto Total</th>
                                <th>Orden Partida</th>
                                <th>Orden Variacion</th>

                                @if(Auth::user()->rol_Usuario == 'administrador')
                                    <th>Ultima Modificacion</th>
                                @endif      
                                @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
                                    <th>Operacion</th>
                                @endif  
                              </thead>
                                <tbody>
                              @foreach($partidas as $datos)
                                <tbody>
                                  <td>{{$datos->nro_Partida}}</td>
                                  <td>{{$datos->codigo}}</td>
                                  <td>{{$datos->cod_Covenin}}</td>
                                  <td>{{$datos->descripcion}}</td>
                                  <td>{{$datos->unidad}}</td>
                                  <td>{{$datos->cantidad}}</td>
                                  <td>{{$datos->monto_Total}}</td>
                                  <td>{{$datos->orden_Partida}}</td>
                                  <td>{{$datos->orden_Variacion}}</td>
                                  @if(Auth::user()->rol_Usuario == 'administrador')
                                      <td>
                                        {{$datos->user->nombre_Usuario}} {{$datos->user->apellido_Usuario}} | {{$datos->updated_at->format('d-m-Y, g:ia')}}
                                      </td>
                                  @endif   
                                    @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
                                          <td  style="text-align: center">
                                            <div class="icon-reorder tooltips" data-original-title="Editar" data-placement="right" style="; text-align: center">
                                                <a href="{!!URL::to('/Proyectos/'.$datos->id.'/edit')!!}" class="" style="text-align: center;">
                                                    <img alt="" src="{!!URL::asset('/img/icon_edit.png')!!}" style="height: 30px; width: 30px">
                                                </a>
                                            </div>
                                          </td>
                                    @endif
                                </tbody>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
          <div class="col-lg-1 col-md-1 col-sm-1"></div>

            <!-- page end-->
    
    @endsection
    @section('scripts')
        {!!Html::script('js/script3.js')!!}
    @endsection
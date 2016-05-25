<html lang="en">
  <head>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	    <title>{{$nombreReporte}}</title>

       <link href="css/bootstrap.min.css" rel="stylesheet"> 
       <link href="css/estilos.css" rel="stylesheet"> 
      <!-- {!!Html::style('css/bootstrap.min.css')!!}  -->		
      <?php 
        $tamProyecto = sizeof($proyectoDescripcion);
        $tamContrato = sizeof($contratoDescripcion);
        $aumentoHeader = 0;
        if ($tamProyecto > 1) {
          $aumentoHeader = $aumentoHeader + (($tamProyecto-1) * 18);
        }
        if ($tamContrato > 1) {
          $aumentoHeader = $aumentoHeader + (($tamContrato-1) * 18);
        }

        $pos_header = 360 + $aumentoHeader;
        $tam_header = $pos_header - 20;
        $margin_header = $pos_header + 45;

        $pos_footer = 175;
        $tam_footer = $pos_footer - 20;
        $margin_footer = $pos_footer - 50;
      ?> 
      <style>
         @page { margin-bottom: 135px; margin-top: {{$margin_header}}px }
         #header { position: fixed; left: 0px; background-color: transparent; top: -{{($pos_header+25)}}px; right: 0px; height: {{$tam_header}}px; }
         #footer { position: fixed; left: 0px; background-color: transparent; bottom: -{{$pos_footer}}px; right: 0px; height: {{$tam_footer}}px; padding-bottom: 20px;}
         #header .page_text:before { content: counter(page) }
      </style>
  </head>
  <body>

    <script type="text/php">
        if ( isset($pdf) ) {
            $font = Font_Metrics::get_font("helvetica", "bold");
            $pdf->page_text(72, 18, "{PAGE_NUM} of {PAGE_COUNT}", $font, 6);
        }
    </script>

  <!--  - - - - - - CABECERA - - - - - -  -->
  <!--  - - - - - - - - - - - - - - - - -  -->
      <div id="header">
          <div class="row ">
              <table class=" col-lg-12" style="width:100%">
                  <tr>
                      <td></td>
                      <td style="text-align: center; width:70%"></td>
                      <th style="text-align: center; width:15%" class="tabla  tabla-sin-borde-bottom" colspan="2">Número</th>
                      <th style="text-align: center; width:15%" class="tabla  tabla-sin-borde-bottom" colspan="2">Vigencia</th>
                  </tr>
                  <tr>
                      <td style="text-align: center; width:70%"></td>
                      <td style="text-align: center; width:15%" class="tabla" colspan="2">F-DO-P&H-151</td>
                      <td style="text-align: center; width:15%" class="tabla" colspan="2">28/03/2016</td>
                  </tr>
              </table>
              <div><br></div>
              <table class=" col-lg-12" style="width:100%">
                  <tr>
                      <td style="text-align: center; width:80%"></td>
                      <td style="text-align: center; width:10%" class="tabla tabla-sin-borde-right tabla-sin-borde-bottom" colspan="2">Página</td>
                      <td style="text-align: center; width:10%" class="tabla tabla-sin-borde-left tabla-sin-borde-bottom page_text" colspan="2"></td>
                  </tr>
              </table>
              <table  class=" col-lg-12" style="width:100%">
                    <tr>
                        <td></td>
                        <td style="text-align: center; width:49%" class="tabla" colspan="2">DATOS EMPRESA CLIENTE</td>
                        <td class="col-lg-1" style="width:2%"></td>
                        <td style="text-align: center; width:49%" class="tabla" colspan="2">DATOS EMPRESA CONTRATISTA</td>
                    </tr>  
              </table>
              <?php
                    $altoCliente = 0;
                    $anchoCliente = 0;
                    $altoProveedor = 0;
                    $anchoProveedor = 0;
                if ($contratos->proyecto->empresa->logo != null) {
                    list($anchoCliente, $altoCliente) = getimagesize(getcwd().'\archivos\\'.$contratos->proyecto->empresa->logo);
                }
                if ($contratos->empresaProveedor->logo != null) {
                    list($anchoProveedor, $altoProveedor) = getimagesize(getcwd().'\archivos\\'.$contratos->empresaProveedor->logo);
                }
                 

              ?>
              <table  class=" col-lg-12" style="width:100%">
                  <tr>
                      <td style="width:49%">
                          <table style="width:100%">
                                <tr>
                                    <td style="text-align: center; width:20%; height: 60px; padding-bottom: 5px; padding-top: 5px; padding-left: 10px" class="tabla tabla-sin-borde-right">
                                        @if($contratos->proyecto->empresa->logo == null)
                                           &nbsp;
                                        @else  
                                            @if($anchoCliente > $altoCliente)
                                                <img src="{{getcwd()}}\archivos\{{$contratos->proyecto->empresa->logo}}" alt="" style=" width: 100px;" />
                                            @else
                                                <img src="{{getcwd()}}\archivos\{{$contratos->proyecto->empresa->logo}}" alt="" style="height: 60px"/>
                                            @endif
                                        @endif  
                                    </td>
                                    <td style="text-align: left; width:80%" class="tabla col-lg-1 tabla-sin-borde-left tam-9">
                                      {{$contratos->proyecto->empresa->nombre_Empresa}}<br>
                                      RIF: {{$contratos->proyecto->empresa->codIdentificacion_Empresa}}<br>
                                      Tlf: {{$contratos->proyecto->empresa->telefono}}<br>
                                      {{$contratos->proyecto->empresa->direccion}}<br>
                                    </td>
                                </tr>    
                          </table>
                      </td>
                      <td style="width:2%" class=" col-lg-12"></td> 
                      <td style="width:49%">
                          <table style="width:100%;" >
                                <tr>  
                                    <td style="text-align: center; width:20%; height: 70px; padding-bottom: 5px; padding-top: 5px; padding-left: 10px" class="tabla tabla-sin-borde-right">
                                        @if($contratos->empresaProveedor->logo == null)
                                            &nbsp;
                                        @else  
                                          @if($anchoProveedor > $altoProveedor)
                                                <img src="{{getcwd()}}\archivos\{{$contratos->empresaProveedor->logo}}" alt="" style=" width: 100px; " />
                                            @else
                                                <img src="{{getcwd()}}\archivos\{{$contratos->empresaProveedor->logo}}" alt="" style="height: 60px"/>
                                            @endif
                                        @endif 
                                    </td>
                                    <td style="text-align: left; width:80%" class="tabla col-lg-1 tabla-sin-borde-left tam-9" >
                                      {{$contratos->empresaProveedor->nombre_Empresa}}<br>
                                      RIF: {{$contratos->empresaProveedor->codIdentificacion_Empresa}}<br>
                                      Tlf: {{$contratos->empresaProveedor->telefono}}<br>
                                      {{$contratos->empresaProveedor->direccion}}<br>
                                    </td>
                                </tr> 
                          </table>
                      </td>
                  </tr> 
              </table>
              <br>
          </div>

        <!-- NOMBRE PROYECTO -->
        <table style="width: 100%">
            <tr>
              <th style="width: 3%"><p class="fuente tam-10">PROYECTO:</p></th>
              <td style="width: 97%"><p class="fuente col-lg-10 tam-9">
                @foreach($proyectoDescripcion as $descripcion)
                    {{strtoupper($descripcion)}}
                @endforeach
              </p></td>
            </tr>
        </table>  
        <!-- FIN NOMBRE PROYECTO -->

        <!-- NOMBRE REPORTE -->
        <table style="width: 100%">
            <tr>
              <th style="text-align: center" class="fuente tam-14 ">ORDEN DE SERVICIO:</th>
            </tr>
        </table>  
        <!-- FIN NOMBRE REPORTE -->
        <br>

        <!-- DATOS DEL CONTRATO -->
          <div class="row ">
              <table  class=" col-lg-12" style="width:100%">
                    <tr>
                        <td></td>
                        <th style="text-align: center; width:18%" class="tabla fuente tam-10">DATOS DEL CONTRATO</th>
                        <th style="text-align: center; width:9%" class="tabla fuente tam-10">INICIO</th>
                        <th style="text-align: center; width:9%" class="tabla fuente tam-10">FIN</th>
                        <th style="text-align: center; width:13%" class="tabla fuente tam-10">MONTO</th>
                        <td class="col-lg-1" style="width:2%"></td>
                        <th style="text-align: center; width:49%" class="tabla" colspan="3">NRO. DE CONTRATO: {{$contratos->nro_Contrato}}</th>
                    </tr>   
                    <tr>
                        <td style="text-align: center;" class="tabla fuente tam-10">ANTERIOR</td>
                        @if($ordenServicioAnterior != null)
                            <td style="text-align: center;" class="tabla fuente tam-10">
                                {{date('d-m-Y', strtotime($ordenServicioAnterior->fecha_inicio))}}
                            </td>
                            <td style="text-align: center;" class="tabla fuente tam-10">
                                {{date('d-m-Y', strtotime($ordenServicioAnterior->fecha_fin))}}
                            </td>
                            <td style="text-align: center;" class="tabla fuente tam-10">
                                {{number_format($valorContratoAnterior, 2, ',','.')}}
                            </td>
                        @else
                            <td style="text-align: center;" class="tabla fuente tam-10"></td>
                            <td style="text-align: center;" class="tabla fuente tam-10"></td>
                            <td style="text-align: center;" class="tabla fuente tam-10"></td>
                        @endif    
                        <td class="col-lg-1" style="width:2%"></td>
                        <td style="text-align: center; width:17%" class="tabla fuente tam-10 ">ORDEN DE SERVICIO:</td>
                        <td style="text-align: center; width:17%" class="tabla fuente tam-10">ADENDUM</td>
                        <td style="text-align: center; width:15%" class="tabla fuente tam-10">FECHA</td>
                    </tr>    
                    <tr>
                        <td style="text-align: center;" class="tabla tam-10">ACTUAL</td>
                        <th style="text-align: center;" class="tabla fuente tam-10">{{date('d-m-Y', strtotime($contratos->fecha_inicio))}}</th>
                        <th style="text-align: center;" class="tabla fuente tam-10">{{date('d-m-Y', strtotime($contratos->fecha_fin))}}</th>
                        <th style="text-align: center; " class="tabla fuente tam-10">{{number_format($valorContrato, 2, ',','.')}}</th>
                        <td class="col-lg-1" style="width:2%"></td>
                        <th style="text-align: center;" class="tabla tam-14">{{$nroAdendum+1}}</th>
                        <th style="text-align: center;" class="tabla tam-14">{{$nroAdendum}}</th>
                        <td style="text-align: center;" class="tabla fuente tam-10">{{date('d-m-Y', strtotime($contratos->fecha_firma))}}</td>
                    </tr> 
              </table>
              <br>
          </div>
        <!-- FIN DATOS DEL CONTRATO -->

        <!-- DESCRIPCION CONTRATO -->
        <table style="width: 100%" >
            <tr>
              <td></td>
              <th style="text-align: left" class="fuente col-lg-1 tabla tabla-sin-borde-bottom tam-10">OBJETO DEL CONTRATO:</th>
            </tr>
            <tr>
              <td style="text-align: left; padding-left:30px" class="fuente col-lg-1 tabla tabla-sin-borde-top tam-9">
                @foreach($contratoDescripcion as $descripcion)
                    {{strtoupper($descripcion)}}
                @endforeach
              </td>
            </tr>
        </table>  
        <!-- FIN DESCRIPCION CONTRATO -->
        <br>
     </div>
<!--  - - - - - - FIN CABECERA - - - - - -  -->
<!--  - - - - - - - - - - - - - - - - - - - -->

   <?php 
      $nro_firmas_cliente = sizeof($firmantes_cliente);
      $nro_firmas_proveedor = sizeof($firmantes_proveedor);
      $porcentaje_posicion_cliente = 100/$nro_firmas_cliente;
      $porcentaje_posicion_proveedor = 100/$nro_firmas_proveedor;

      $contadorCliente = 0;  
      $contadorProveedor = 0;  

   ?>
<!--  - - - - - - PIE - - - - - -  -->
<!--  - - - - - - - - - - - - - - - - -  -->
   <div id="footer">
      <table style="width: 100%" >
          <tr>
            <td></td>
            <td style="width: 50%; text-align: left; padding-left: 5px" colspan="{{$nro_firmas_cliente}}" class="fuente tabla tabla tabla-sin-borde-bottom ">POR {{$contratos->proyecto->empresa->nombre_Empresa}}</td>
            <td style="width: 50%; text-align: left; padding-left: 5px" colspan="{{$nro_firmas_proveedor}}" class="fuente tabla tabla tabla-sin-borde-bottom ">POR {{$contratos->empresaProveedor->nombre_Empresa}}</td>
          </tr>
          <tr>
            <!-- Por la Empresa Cliente -->
          @foreach($firmantes_cliente as $firmante) 
              @if($nro_firmas_cliente == 1) 
                  <td style="text-align: center; width: {{$porcentaje_posicion_cliente}}%" class="fuente tabla tam-9 tabla-sin-borde-top"><br><br><br>{{$firmante->accion}}<br>{{$firmante->firmante->nombre}} {{$firmante->firmante->apellido}}</td>
              @else
                  @if($contadorCliente == 0)
                      <td style="text-align: center; width: {{$porcentaje_posicion_cliente}}%" class="fuente tabla tam-9 tabla-sin-borde-right tabla-sin-borde-top"><br><br><br>{{$firmante->accion}}<br>{{$firmante->firmante->nombre}} {{$firmante->firmante->apellido}}</td>
                  @elseif($contadorCliente == $contadorCliente-1)    
                      <td style="text-align: center; width: {{$porcentaje_posicion_cliente}}%" class="fuente tabla tam-9 tabla-sin-borde-left tabla-sin-borde-top"><br><br><br>{{$firmante->accion}}<br>{{$firmante->firmante->nombre}} {{$firmante->firmante->apellido}}</td>
                  @else  
                      <td style="text-align: center; width: {{$porcentaje_posicion_cliente}}%" class="fuente tabla tam-9 tabla-sin-borde-left tabla-sin-borde-right tabla-sin-borde-top"><br><br><br>{{$firmante->accion}}<br>{{$firmante->firmante->nombre}} {{$firmante->firmante->apellido}}</td>
                  @endif
              @endif    
              <?php  $contadorCliente++ ?>   
          @endforeach 

            <!-- Por la Empresa Proveedor -->
          @foreach($firmantes_proveedor as $firmante)  
              @if($nro_firmas_proveedor == 1) 
                  <td style="text-align: center; width: {{$porcentaje_posicion_proveedor}}%" class="fuente tabla tam-9 tabla-sin-borde-top"><br><br><br>{{$firmante->accion}}<br>{{$firmante->firmante->nombre}} {{$firmante->firmante->apellido}}</td>
              @else
                  @if($contadorProveedor == 0)
                      <td style="text-align: center; width: {{$porcentaje_posicion_proveedor}}%" class="fuente tabla tam-9 tabla-sin-borde-right tabla-sin-borde-top"><br><br><br>{{$firmante->accion}}<br>{{$firmante->firmante->nombre}} {{$firmante->firmante->apellido}}</td>
                  @elseif($contadorProveedor == $nro_firmas_proveedor-1)    
                      <td style="text-align: center; width: {{$porcentaje_posicion_proveedor}}%" class="fuente tabla tam-9 tabla-sin-borde-left tabla-sin-borde-top"><br><br><br>{{$firmante->accion}}<br>{{$firmante->firmante->nombre}} {{$firmante->firmante->apellido}}</td>
                  @else  
                      <td style="text-align: center; width: {{$porcentaje_posicion_proveedor}}%" class="fuente tabla tam-9 tabla-sin-borde-left tabla-sin-borde-right tabla-sin-borde-top"><br><br><br>{{$firmante->accion}}<br>{{$firmante->firmante->nombre}} {{$firmante->firmante->apellido}}</td>
                  @endif
              @endif    
              <?php  $contadorProveedor++ ?>   
          @endforeach  
          </tr>
      </table> 
   </div>
<!--  - - - - - - FIN PIE - - - - - -  -->
<!--  - - - - - - - - - - - - - - - - - -->   
      

      <!-- PRESUPUESTO -->  
          <table  class=" " style="width: 100%">
            <thead>
                <tr>  
                  <th></th>
                    <th style="text-align: center; width: 3%"  class=" tabla tam-10"></th>
                    <th style="text-align: center; width: 32%"  class=" tabla tam-10">DESCRIPCIÓN</th>
                    <th style="text-align: center; width: 10%" class=" tabla tam-10">UND</th>
                    <th style="text-align: center; width: 15%" class=" tabla tam-10">CANTIDAD CONTRATADA</th>
                    <th style="text-align: center; width: 20%" class=" tabla tam-10">PRECIO UNITARIO<br>({{$contratos->moneda->symbol}})</th>
                    <th style="text-align: center; width: 20%" class=" tabla tam-10">TOTAL CONTRATO<br>({{$contratos->moneda->symbol}})</th>
                </tr>  
            </thead>
          </table>
            @foreach($partidas as $datos) 
          <table  class="  " style="width: 100%; page-break-inside: avoid;">
                <tr >
                  <td style="text-align: center; width: 3%"  class="tabla tam-9 ">{{$datos->partida->nro_Partida}}</td>
                  <td style="text-align: left; width: 32%" class=" tabla tam-9 col-lg-1" >{{strtoupper($datos->descripcion)}}</td>
                  <td style="text-align: center; width: 10%" class=" tabla tam-9 col-lg-1">{{strtoupper($datos->unidad)}}</td>
                  <td style="text-align: right; width: 15%" class=" tabla tam-10 col-lg-1">{{number_format($datos->cantidad, 2, ',','.')}}</td>
                  <td style="text-align: right; width: 20%" class="tabla tam-10 col-lg-1" >{{number_format($datos->partida->precio_Unitario, 2, ',','.')}}</td>
                  <td style="text-align: right; width: 20%" class=" tabla tam-10 col-lg-1">{{number_format($datos->monto_Total, 2, ',','.')}}</td>
                </tr>
          </table>
            @endforeach
          <table  class=" " style="width: 100%">
                <tr>
                  <th style="text-align: right; background-color: #c6d9f1; width: 80%" class="tabla tam-10 col-lg-1">TOTAL ({{$contratos->moneda->symbol}}):</th>
                  <th style="text-align: right; background-color: #c6d9f1; width: 20%" class="tabla tam-10 col-lg-1">{{number_format($valorContrato, 2, ',','.')}}</th>
                </tr>  
          </table>

        </div>
      <!-- FIN PRESUPUESTO -->  
      <!-- OBSERVACIONES CONTRATO -->
      <table style="width: 100%; page-break-inside: avoid;" >
          <tr>
            <td></td>
            <th style="text-align: left" class="fuente col-lg-1 tabla tabla-sin-borde-bottom tam-10">OBSERVACIONES:</th>
          </tr>
          <tr>
            <td style="text-align: left; padding-left:30px; " class="fuente col-lg-1 tabla tabla-sin-borde-top tabla-sin-borde-bottom tam-10">
            </td>
          </tr>
      </table>
      <?php
          $i=0;
      ?>
      @foreach($contratoObservaciones as $observaciones)        
          <table style="width: 100%; page-break-inside: avoid;" >    
              <tr>
                @if($i == (sizeof($contratoObservaciones)-1))
                    <td style="text-align: left; padding-left:30px" class="fuente col-lg-1 tabla tabla-sin-borde-top tam-9">
                        {{strtoupper($observaciones)}}
                    </td>
                @else
                    <td style="text-align: left; padding-left:30px" class="fuente col-lg-1 tabla tabla-sin-borde-top tabla-sin-borde-bottom tam-9">
                        {{strtoupper($observaciones)}}
                    </td>
                @endif    
              </tr>
          </table> 
      <?php
          $i++;
      ?>
      @endforeach 
    
  </body>
</html>

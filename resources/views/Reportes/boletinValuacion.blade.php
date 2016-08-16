<html lang="en">
  <head>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	    <title>{{$nombreReporte}}</title>

       <link href="css/bootstrap.min.css" rel="stylesheet"> 
       <link href="css/estilos.css" rel="stylesheet"> 
       <link rel="shortcut icon" href="{!!URL::asset('img/favicon.png')!!}">

      <!-- {!!Html::style('css/bootstrap.min.css')!!}   
       {!!Html::style('css/estilos.css')!!}  	--> 
      <?php 


        $tamProyecto = sizeof($proyectoDescripcion);
        $tamContrato = sizeof($contratoDescripcion);
        $aumentoHeader = 0;
        if ($tamProyecto > 1) {
          $aumentoHeader = $aumentoHeader + (($tamProyecto-1) * 15);
        }
        if ($tamContrato > 1) {
          $aumentoHeader = $aumentoHeader + (($tamContrato-1) * 15);
        }

        $pos_header = 225 + $aumentoHeader;
        $tam_header = $pos_header - 20;
        $margin_header = $pos_header + 45;

        $pos_footer = 175;
        $tam_footer = $pos_footer - 20;
        $margin_footer = $pos_footer - 50;
      ?> 
      <style>
         @page { margin-bottom: {{$margin_footer}}px; margin-top: {{$margin_header}}px }
         #header { position: fixed; left: 0px; background-color: transparent; top: -{{($pos_header+30)}}px; right: 0px; height: {{$tam_header}}px;}
         #footer { position: fixed; left: 0px; background-color: transparent; bottom: -{{$pos_footer}}px; right: 0px; height: {{$tam_footer}}px; padding-bottom: 20px;}
         #header .page_text:before { content: counter(page) }
      </style>
  </head>

  <body>

  <!--  - - - - - - CABECERA - - - - - -  -->
  <!--  - - - - - - - - - - - - - - - - -  -->
      <div id="header">
          <div class="row col-lg-12">
            <table class=" " style="width:100%">
                  <tr>
                      <td></td>
                      <td style="text-align: center; width:70%"></td>
                      <th style="text-align: center; width:15%" class="tabla  tabla-sin-borde-bottom" colspan="2">Número</th>
                      <th style="text-align: center; width:15%" class="tabla  tabla-sin-borde-bottom" colspan="2">Vigencia</th>
                  </tr>
                  <tr>
                      <td style="text-align: center; width:70%"></td>
                      <td style="text-align: center; width:15%" class="tabla" colspan="2">F-DO-P&H-154</td>
                      <td style="text-align: center; width:15%" class="tabla" colspan="2">28/03/2016</td>
                  </tr>
              </table>
              <div><br></div>
            <table class=" " style="width:100%">
                  <tr>
                      <td></td>
                      <td style="text-align: center; width:80%"></td>
                      <td style="text-align: center; width:10%" class="tabla tabla-sin-borde-right tabla-sin-borde-bottom" colspan="2">Página</td>

                      <td style="text-align: center; width:10%" class="tabla tabla-sin-borde-left tabla-sin-borde-bottom page_text" colspan="2"></td>
                  </tr>
              </table>
                  <table   style="width: 100%;">
                        <tr>
                          <td></td>
                            <td style="text-align: center; width:16%; padding-bottom: 5px; padding-top: 5px" class="tabla tabla-sin-borde-right">
                                @if($valuacion->contrato->proyecto->empresa->logo == null)
                                  No image
                                @else  
                                  <img src="{{getcwd()}}\archivos\{{$valuacion->contrato->proyecto->empresa->logo}}" alt="" style="height: 60px"/>
                                @endif  
                            </td>
                            <td style="text-align: left; width:54%" class="tabla tabla-sin-borde-left">
                              {{$valuacion->contrato->proyecto->empresa->nombre_Empresa}}<br>
                              {{$valuacion->contrato->proyecto->empresa->codIdentificacion_Empresa}}<br>
                              {{$valuacion->contrato->proyecto->empresa->telefono}}<br>
                              {{$valuacion->contrato->proyecto->empresa->direccion}}<br>
                            </td>
                            <td style="width:30%" class="tabla tabla-sin-borde-left" >
                                <table style="width: 100%" >
                                    <tr>
                                      <th style="width:100%; text-align: center; background-color: #c6d9f1" class="fuente tam-10 tabla tabla-sin-borde-top">CONTROL DE VALUACION:</th>
                                    </tr>
                                </table>

                                <table style="width: 100%" >    
                                    <tr>
                                      <td style="width:50%; text-align: center; color: #234a77" class="tabla fuente tam-10 tabla tabla-sin-borde-right tabla-sin-borde-top">Nro. De Contrato</td>
                                      <td style="width:50%; text-align: center; " class="tabla fuente tam-10 tabla tabla-sin-borde-left tabla-sin-borde-top">{{$valuacion->contrato->nro_Contrato}}</td>
                                    </tr>
                                </table>
                                <table style="width: 100%" >    
                                    <tr>
                                      <td style="width:50%; text-align: center; color: #234a77" class="tabla fuente tam-10 tabla tabla-sin-borde-right tabla-sin-borde-top">Contratista</td>
                                      <td style="width:50%; text-align: center;" class="tabla fuente tam-10 tabla tabla-sin-borde-left tabla-sin-borde-top">{{$valuacion->contrato->empresaProveedor->nombre_Empresa}}</td>
                                    </tr>
                                </table>
                                <table style="width: 100%" >    
                                    <tr>
                                      <td style="width:50%; text-align: center; color: #234a77" class="tabla fuente tam-10 tabla tabla-sin-borde-right tabla-sin-borde-top">RIF</td>
                                      <td style="width:50%; text-align: center;" class="tabla fuente tam-10 tabla tabla-sin-borde-left tabla-sin-borde-top">{{$valuacion->contrato->empresaProveedor->codIdentificacion_Empresa}}</td>
                                    </tr>
                                </table>
                                <table style="width: 100%" >    
                                    <tr>
                                      <td style="width:25%; text-align: center; color: #234a77" class="tabla fuente tam-10 tabla tabla-sin-borde-right tabla-sin-borde-top">Boletín N°</td>
                                      <th style="width:25%; text-align: center;" class="tabla fuente tam-10 tabla tabla-sin-borde-left tabla-sin-borde-top">{{$valuacion->nro_Boletin}}</th>                     
                                      <td style="width:25%; text-align: center; color: #234a77" class="tabla fuente tam-10 tabla tabla-sin-borde-right tabla-sin-borde-top">Valuación N°</td>
                                      <th style="width:25%; text-align: center;" class="tabla fuente tam-10 tabla tabla-sin-borde-left tabla-sin-borde-top">{{$valuacion->nro_Valuacion}}</th>
                                    </tr>
                                </table>
                                <table style="width: 100%" >    
                                    <tr>
                                      <td style="width:50%; text-align: center; color: #234a77" class="tabla fuente tam-10 tabla tabla-sin-borde-right tabla-sin-borde-top">Período</td>
                                      <td style="width:25%; text-align: center;" class="tabla fuente tam-10 tabla  tabla-sin-borde-top">{{date('d-m-Y', strtotime($valuacion->fecha_Inicio_Periodo))}}</td>
                                      <td style="width:25%; text-align: center;" class="tabla fuente tam-10 tabla tabla-sin-borde-left tabla-sin-borde-top">{{date('d-m-Y', strtotime($valuacion->fecha_Fin_Periodo))}}</td>
                                    </tr>
                                </table>

                            </td>
                        </tr> 
                  </table>
              </div>
              

        <!-- NOMBRE PROYECTO -->
        <div style="width=: 100%; height: 8px"></div>
        <table style="width: 100%;" >
            <tr>
              <th style="width: 6%; border-top-style: double; border-bottom-style: double; border-top-width: 3px; border-bottom-width: 3px" class="tabla fuente tam-9 tabla-sin-borde-right ">&nbsp;PROYECTO:</th>
              <td style="width: 94%; border-top-style: double; border-bottom-style: double; border-top-width: 3px; border-bottom-width: 3px; padding-left: 3px" class="tabla fuente tam-9 tabla-sin-borde-left">
                  @foreach($proyectoDescripcion as $descripcion)
                      {{strtoupper($descripcion)}}
                  @endforeach
              </td>
            </tr>
        </table>  
        <table style="width: 100%;">
            <tr>
              <th style="width: 13%; margin-left: 3px; border-bottom-style: double; border-bottom-width: 3px" class="tabla fuente tam-9 tabla-sin-borde-right tabla-sin-borde-top">&nbsp;OBJETO DEL CONTRATO:</th>
              <td style="width: 87%; border-bottom-style: double; border-bottom-width: 3px; padding-left: 3px" class="tabla fuente tam-9 tabla-sin-borde-left tabla-sin-borde-top">
                  @foreach($contratoDescripcion as $descripcion)
                      {{strtoupper($descripcion)}}
                  @endforeach
              </td>
            </tr>
        </table>
        <!-- FIN NOMBRE PROYECTO -->
     </div>
<!--  - - - - - - FIN CABECERA - - - - - -  -->
<!--  - - - - - - - - - - - - - - - - - - - -->

   <?php 
      $nro_firmas = sizeof($firmantes_cliente) + sizeof($firmantes_proveedor);
      $porcentaje_posicion = 100/$nro_firmas;

      $contador = 0;  

   ?>



      <table style="width: 100%" class="fuente tam-9">
          <thead>
            <tr >
                <th class="tabla fuente tam-9" style="width: 3%; text-align: center">Part</th>
                <th class="tabla fuente tam-9" style="width: 25%; text-align: center">DESCRIPCIÓN</th>
                <th class="tabla fuente tam-9" style="width: 4%; text-align: center">UND</th>
                <th class="tabla fuente tam-9" style="width: 7%; text-align: center">Cantidad Contratada</th>
                <th class="tabla fuente tam-9" style="width: 7%; text-align: center">Precio Unitario ({{$valuacion->contrato->moneda->symbol}})</th>
                <th class="tabla fuente tam-9" style="width: 7%; text-align: center">Precio Total ({{$valuacion->contrato->moneda->symbol}})</th>
                <th class="tabla fuente tam-9" style="width: 5%; text-align: center">CC</th>
                <th style="width: 21%; text-align: center">
                  <table style="width: 100%; text-align: center">
                    <tr>
                        <td></td>
                        <th colspan="3" style="text-align: center" class="tabla fuente tam-9 tabla-sin-borde-right">CANTIDADES EJECUTADAS</th>
                    </tr>
                    <tr>
                        <th style="width: 33.3%; text-align: center" class="tabla fuente tam-9 tabla-sin-borde-right">ANTERIOR</th>                                    
                        <th style="width: 33.3%; text-align: center" class="tabla fuente tam-9 tabla-sin-borde-right">ACTUAL</th>                                    
                        <th style="width: 33.3%; text-align: center" class="tabla fuente tam-9 tabla-sin-borde-right">ACUMULADO</th> 
                    </tr>
                  </table> 
                </th>
                <th style="width: 21%; text-align: center">
                  <table style="width: 100%; text-align: center">
                    <tr>
                        <td></td>
                        <th colspan="3" style="text-align: center" class="tabla fuente tam-9">MONTOS EJECUTADOS ({{$valuacion->contrato->moneda->symbol}})</th>
                    </tr>
                    <tr>
                        <th style="width: 33.3%; text-align: center" class="tabla fuente tam-9">ANTERIOR</th>                                    
                        <th style="width: 33.3%; text-align: center" class="tabla fuente tam-9">ACTUAL</th>                                    
                        <th style="width: 33.3%; text-align: center" class="tabla fuente tam-9">ACUMULADO</th> 
                    </tr>
                  </table> 
                </th>  
            </tr>    
          </thead>       
      </table>
    <?php
        $Total_PrecioTotal = 0;
        $Total_MontoEjecutado = 0;
        $Total_MontoAcumulado = 0;
        $Total_MontoAnterior = 0;
    ?>  
    @foreach($acumuladosPartida as $datos)
    <?php
        $cantAnterior = $datos->CantidadAcumulada - $datos->CantidadTrabajada;
        $montoAnterior = $datos->MontoAcumulado - $datos->MontoTrabajado;
        $Total_MontoEjecutado = $Total_MontoEjecutado + $datos->MontoTrabajado;
        $Total_MontoAcumulado = $Total_MontoAcumulado + $datos->MontoAcumulado;
        $Total_MontoAnterior = $Total_MontoAnterior + $montoAnterior;
        $Total_PrecioTotal = $Total_PrecioTotal + $datos->PrecioTotal;
    ?>
      <table style="width: 100%; page-break-inside: avoid;" class="fuente tam-9">
          <tbody>
              <tr>
                  <td class="tabla fuente tam-9 tabla-sin-borde-bottom" style="width: 3%; text-align: center">{{$datos->Partida}}</td>
                  <td class="tabla fuente tam-9 tabla-sin-borde-bottom " style="width: 25%; text-align: left; padding-left: 10px; padding-right: 10px">{{strtoupper($datos->Descripcion)}}</td>
                  <td class="tabla fuente tam-9 tabla-sin-borde-bottom" style="width: 4%; text-align: center">{{$datos->Unidad}}</td>
                  <td class="tabla fuente tam-9 tabla-sin-borde-bottom" style="width: 7%; text-align: right">{{number_format($datos->CantidadContratada, 2, ',','.')}}&nbsp;</td>
                  <td class="tabla fuente tam-9 tabla-sin-borde-bottom" style="width: 7%; text-align: right">{{number_format($datos->PrecioUnitario, 2, ',','.')}}&nbsp;</td>
                  <td class="tabla fuente tam-9 tabla-sin-borde-bottom" style="width: 7%; text-align: right">{{number_format($datos->PrecioTotal, 2, ',','.')}}&nbsp;</td>
                  @if($datos->CC == '0')
                      <td class="tabla fuente tam-9 tabla-sin-borde-bottom" style="width: 5%; text-align: center">-</td>
                  @else
                      <td class="tabla fuente tam-9 tabla-sin-borde-bottom" style="width: 5%; text-align: center">{{$datos->CC}}</td>
                  @endif    
                  @if($cantAnterior == 0)
                      <td class="tabla fuente tam-9 tabla-sin-borde-bottom col-lg-1" style="width: 7%; text-align: right">-</td>
                  @else
                      <td class="tabla fuente tam-9 tabla-sin-borde-bottom" style="width: 7%; text-align: right">{{number_format($cantAnterior, 2, ',','.')}}&nbsp;</td>
                  @endif 
                  @if($datos->CantidadTrabajada == 0)
                      <td class="tabla fuente tam-9 tabla-sin-borde-bottom col-lg-1" style="width: 7%; text-align: right">-</td>
                  @else
                      <td class="tabla fuente tam-9 tabla-sin-borde-bottom" style="width: 7%; text-align: right">{{number_format($datos->CantidadTrabajada, 2, ',','.')}}&nbsp;</td>
                  @endif
                  @if($datos->CantidadAcumulada == 0)
                      <td class="tabla fuente tam-9 tabla-sin-borde-bottom col-lg-1" style="width: 7%; text-align: right">-</td>
                  @else
                      <td class="tabla fuente tam-9 tabla-sin-borde-bottom" style="width: 7%; text-align: right">{{number_format($datos->CantidadAcumulada, 2, ',','.')}}&nbsp;</td>
                  @endif 
                  @if($montoAnterior == 0)
                      <td class="tabla fuente tam-9 tabla-sin-borde-bottom col-lg-1" style="width: 7%; text-align: right">-</td>
                  @else
                      <td class="tabla fuente tam-9 tabla-sin-borde-bottom" style="width: 7%; text-align: right">{{number_format($montoAnterior, 2, ',','.')}}&nbsp;</td>
                  @endif 
                  @if($datos->MontoTrabajado == 0)
                      <td class="tabla fuente tam-9 tabla-sin-borde-bottom col-lg-1" style="width: 7%; text-align: right">-</td>
                  @else
                      <td class="tabla fuente tam-9 tabla-sin-borde-bottom" style="width: 7%; text-align: right">{{number_format($datos->MontoTrabajado, 2, ',','.')}}&nbsp;</td>
                  @endif
                  @if($datos->MontoAcumulado == 0)
                      <td class="tabla fuente tam-9 tabla-sin-borde-bottom col-lg-1" style="width: 7%; text-align: right">-</td>
                  @else
                      <td class="tabla fuente tam-9 tabla-sin-borde-bottom" style="width: 7%; text-align: right">{{number_format($datos->MontoAcumulado, 2, ',','.')}}&nbsp;</td>
                  @endif
              </tr>
          </tbody>
      </table>  
    @endforeach
    <?php
        
        $MontoActualIdeal = $Total_PrecioTotal - $Total_MontoAnterior;
        $diferenciaMontoActual = $MontoActualIdeal - $Total_MontoEjecutado;
        $diferenciaMontoTotal = $Total_PrecioTotal - $Total_MontoAcumulado;
        if ($diferenciaMontoActual < 1) {
          $Total_MontoEjecutado = $Total_MontoEjecutado + $diferenciaMontoActual;
        }
        if ($diferenciaMontoTotal < 1) {
          $Total_MontoAcumulado = $Total_MontoAcumulado + $diferenciaMontoTotal;
        }
    ?>
      <table style="width: 100%; page-break-inside: avoid;" class=" fuente tam-9">
          <tbody>
              <tr>
                  <td class="tabla grosor-3/2 fuente tam-9 " style="width: 3%; text-align: center"></td>
                  <td class="tabla grosor-3/2 fuente tam-9 col-lg-1" style="width: 25%; text-align: right">SUB TOTAL:</td>
                  <td class="tabla grosor-3/2 fuente tam-9" style="width: 4%; text-align: center"></td>
                  <td class="tabla grosor-3/2 fuente tam-9" style="width: 7%; text-align: center"></td>
                  <td class="tabla grosor-3/2 fuente tam-9" style="width: 7%; text-align: center"></td>

                  @if($Total_PrecioTotal == 0)
                      <td class="tabla grosor-3/2 fuente tam-9 col-lg-1" style="width: 7%; text-align: right">-</td>
                  @else
                      <td class="tabla grosor-3/2 fuente tam-9" style="width: 7%; text-align: right">{{number_format($Total_PrecioTotal, 2, ',','.')}}&nbsp;</td>
                  @endif
                  <td class="tabla grosor-3/2 fuente tam-9" style="width: 5%; text-align: right"></td>
                  <td class="tabla grosor-3/2 fuente tam-9" style="width: 7%; text-align: right"></td>
                  
                  <td class="tabla grosor-3/2 fuente tam-9" style="width: 7%; text-align: right"></td>
                  
                  <td class="tabla grosor-3/2 fuente tam-9" style="width: 7%; text-align: right"></td>
                  @if($Total_MontoAnterior == 0)
                      <td class="tabla grosor-3/2 fuente tam-9 col-lg-1" style="width: 7%; text-align: right">-</td>
                  @else
                      <td class="tabla grosor-3/2 fuente tam-9" style="width: 7%; text-align: right">{{number_format($Total_MontoAnterior, 2, ',','.')}}&nbsp;</td>
                  @endif 
                  @if($Total_MontoEjecutado == 0)
                      <td class="tabla grosor-3/2 fuente tam-9 col-lg-1" style="width: 7%; text-align: right">-</td>
                  @else
                      <td class="tabla grosor-3/2 fuente tam-9" style="width: 7%; text-align: right">{{number_format($Total_MontoEjecutado, 2, ',','.')}}&nbsp;</td>
                  @endif
                  @if($Total_MontoAcumulado == 0)
                      <td class="tabla grosor-3/2 fuente tam-9 col-lg-1" style="width: 7%; text-align: right">-</td>
                  @else
                      <td class="tabla grosor-3/2 fuente tam-9" style="width: 7%; text-align: right">{{number_format($Total_MontoAcumulado, 2, ',','.')}}&nbsp;</td>
                  @endif
              </tr>
          </tbody>
      </table>

      <?php
          $IVA_Total_MontoAnterior = (($Total_MontoAnterior/100) * $IVA);
          $IVA_Total_MontoEjecutado = (($Total_MontoEjecutado/100) * $IVA);
          $IVA_Total_MontoAcumulado = (($Total_MontoAcumulado/100) * $IVA);

          $Total_MontoAnterior_conIVA = $IVA_Total_MontoAnterior + $Total_MontoAnterior;
          $Total_MontoEjecutado_conIVA = $IVA_Total_MontoEjecutado + $Total_MontoEjecutado;
          $Total_MontoAcumulado_conIVA = $IVA_Total_MontoAcumulado + $Total_MontoAcumulado;

          $Total_MontoEjecutado_conIVA_Neto = $Total_MontoEjecutado_conIVA + $montoAnticiposValuacion + $montoAdelantosValuacion;
          $Total_MontoEjecutado_conIVA_Neto_Anterior = $Total_MontoAnterior_conIVA + $montoAnticiposValuacion_Anterior + $montoAdelantosValuacion_Anterior;
          $Total_MontoAcumulado_conIVA_Neto = $Total_MontoAcumulado_conIVA + $montoAnticiposTotal + $montoAdelantosTotal;
      ?>
       <table style="width: 100%; page-break-inside: avoid;" class=" fuente tam-9">
          <tr>
            <td style="width: 70%; padding-top: 5px" class="tabla tabla-sin-borde-right "></td>
              <td style="width: 9%; padding-top: 5px"class="tabla tabla-sin-borde-right tabla-sin-borde-left ">
                  <table>
                      <tr>
                          <td></td>
                           <td class=" fuente tam-9 tabla-sin-borde-right" style="text-align: right">IVA:&nbsp;</td> 
                      </tr>
                      <tr>
                           <td class=" fuente tam-9 tabla-sin-borde-right" style="text-align: right">TOTAL CON IVA:&nbsp;</td> 
                      </tr>
                  </table>  
              </td>
              <td style="width: 7%; padding-top: 5px"class="tabla tabla-sin-borde-right tabla-sin-borde-left ">
                  <table style="width: 100%;">
                      <tr>
                          <td></td>
                            @if($IVA_Total_MontoAnterior == 0)
                                <td class="tabla fuente tam-9 col-lg-1" style="text-align: right">-</td>
                            @else
                                <td class="tabla fuente tam-9" style="text-align: right">{{number_format($IVA_Total_MontoAnterior, 2, ',','.')}}&nbsp;</td>
                            @endif
                      </tr>
                      <tr>  
                            @if($Total_MontoAnterior_conIVA == 0)
                                <td class="tabla fuente tam-9 tabla-sin-borde-bottom col-lg-1" style="text-align: right">-</td>
                            @else
                                <td class="tabla fuente tam-9 tabla-sin-borde-bottom" style="text-align: right">{{number_format($Total_MontoAnterior_conIVA, 2, ',','.')}}&nbsp;</td>
                            @endif
                      </tr>
                  </table>  
              </td>
              <td style="width: 7%; padding-top: 5px"class="tabla tabla-sin-borde-right tabla-sin-borde-left ">
                  <table style="width: 100%;">
                      <tr>
                          <td></td>
                          @if($IVA_Total_MontoEjecutado == 0)
                                <td class="tabla fuente tam-9 tabla-sin-borde-left col-lg-1" style="text-align: right">-</td>
                            @else
                                <td class="tabla fuente tam-9 tabla-sin-borde-left" style="text-align: right">{{number_format($IVA_Total_MontoEjecutado, 2, ',','.')}}&nbsp;</td>
                            @endif
                      </tr>
                      <tr>
                        @if($Total_MontoEjecutado_conIVA == 0)
                                <td class="tabla fuente tam-9 tabla-sin-borde-left tabla-sin-borde-bottom col-lg-1" style="text-align: right">-</td>
                            @else
                                <td class="tabla fuente tam-9 tabla-sin-borde-left tabla-sin-borde-bottom" style="text-align: right">{{number_format($Total_MontoEjecutado_conIVA, 2, ',','.')}}&nbsp;</td>
                            @endif
                      </tr>
                  </table>  
              </td>
              <td style="width: 7%; padding-top: 5px"class="tabla tabla-sin-borde-left ">
                  <table style="width: 100%;">
                      <tr>
                          <td></td>
                          @if($IVA_Total_MontoAcumulado == 0) 
                                <td class="tabla fuente tam-9 tabla-sin-borde-left tabla-sin-borde-right col-lg-1" style="text-align: right">-</td>
                            @else
                                <td class="tabla fuente tam-9 tabla-sin-borde-left tabla-sin-borde-right" style="text-align: right">{{number_format($IVA_Total_MontoAcumulado, 2, ',','.')}}&nbsp;</td>
                            @endif
                      </tr>
                      <tr>
                          @if($Total_MontoAcumulado_conIVA == 0)
                                <td class="tabla fuente tam-9 tabla-sin-borde-left tabla-sin-borde-right tabla-sin-borde-bottom col-lg-1" style="text-align: right">-</td>
                            @else
                                <td class="tabla fuente tam-9 tabla-sin-borde-left tabla-sin-borde-right tabla-sin-borde-bottom" style="text-align: right">{{number_format($Total_MontoAcumulado_conIVA, 2, ',','.')}}&nbsp;</td>
                            @endif
                      </tr>
                  </table>  
              </td>
          </tr>
      </table>
      <table style="width: 100%; page-break-inside: avoid;" >
          <tr>
            <td style="text-align: left" class="fuente col-lg-1 tabla tabla-sin-borde-bottom fuente tam-9">OBSERVACIONES:</td>
          </tr>
      </table>
      <table style="width: 100%; page-break-inside: avoid;" >    
          <tr>
            <td style="text-align: left; padding-left:30px" class="fuente col-lg-1 tabla tabla-sin-borde-top tabla-sin-borde-bottom">
              {{$valuacion->observaciones}}
            </td>
          </tr>
      </table>  
      <table style="width: 100%; page-break-inside: avoid;" class=" fuente tam-9">
          <tr>
              <td style="width: 63%;" class="col-lg-1 tabla tabla-sin-borde-right  fuente tam-9">
                  ANTICIPO
              </td>
              <td style="width: 16%; padding-top: 10px; padding-right: 5px" class="tabla tabla-sin-borde-right tabla-sin-borde-left ">
                  <table style="width: 100%;">
                      <tr>
                          <td></td>
                          <td class=" fuente tam-9 tabla-sin-borde-right" style="text-align: right">ENTREGADO:&nbsp;</td>
                      </tr>
                      <tr>
                          <td class=" fuente tam-9 tabla-sin-borde-right" style="text-align: right">AMORTIZADO:&nbsp;</td>
                      </tr>
                      <tr>
                          <td class=" fuente tam-9 tabla-sin-borde-right" style="text-align: right">SALDO:&nbsp;</td>
                      </tr>
                  </table> 
              </td>
              <td style="width: 7%; padding-top: 10px" class="tabla tabla-sin-borde-right  tabla-sin-borde-left">
                  <table style="width: 100%;">
                      <tr>
                          <td></td>
                        @if($montoAnticiposTotal_Anterior == 0)
                          <td class=" fuente tam-9 tabla-sin-borde-right col-lg-1" style="text-align: right">-</td>
                        @else  
                          <td class=" fuente tam-9 tabla-sin-borde-right" style="text-align: right">{{number_format($montoAnticiposTotal_Anterior, 2, ',','.')}}</td>
                        @endif
                          
                      </tr>
                      <tr>
                        @if($descuentosAnticiposTotal_Anterior == 0)
                          <td class=" fuente tam-9 tabla-sin-borde-right col-lg-1" style="text-align: right">-</td>
                        @else  
                          <td class=" fuente tam-9 tabla-sin-borde-right" style="text-align: right">-{{number_format($descuentosAnticiposTotal_Anterior, 2, ',','.')}}</td>
                        @endif
                          
                      </tr>
                      <tr>
                          @if($diferenciaAnticipos_Anterior == 0)
                            <td class="fuente tam-9 tabla-sin-borde-right col-lg-1" style="text-align: right">-</td>
                          @else 
                            <th class=" fuente tam-9 tabla-sin-borde-right" style="text-align: right">{{number_format($diferenciaAnticipos_Anterior, 2, ',','.')}}</th>
                          @endif
                      </tr>
                  </table> 
              </td>
              <td style="width: 7%; padding-top: 10px" class="tabla tabla-sin-borde-right  tabla-sin-borde-left">
                  <table style="width: 100%;">
                      <tr>
                          <td></td>
                        @if($montoAnticiposValuacion == 0)
                          <td class=" fuente tam-9 tabla-sin-borde-right col-lg-1" style="text-align: right">-</td>
                        @else  
                          <td class=" fuente tam-9 tabla-sin-borde-right" style="text-align: right">{{number_format($montoAnticiposValuacion, 2, ',','.')}}</td>
                        @endif
                          
                      </tr>
                      <tr>
                        @if($descuentosAnticiposValuacion == 0)
                          <td class=" fuente tam-9 tabla-sin-borde-right col-lg-1" style="text-align: right">-</td>
                        @else  
                          <td class=" fuente tam-9 tabla-sin-borde-right" style="text-align: right">-{{number_format($descuentosAnticiposValuacion, 2, ',','.')}}</td>
                        @endif
                          
                      </tr>
                      <tr>
                          <td class=" fuente tam-9 tabla-sin-borde-right" style="text-align: right">&nbsp;</td>
                      </tr>
                  </table> 
              </td>
              <td style="width: 7%; padding-top: 10px" class="tabla  tabla-sin-borde-left">
                  <table style="width: 100%;">
                      <tr>
                          <td></td>
                          @if($montoAnticiposTotal == 0)
                            <td class=" fuente tam-9 tabla-sin-borde-right col-lg-1" style="text-align: right">-</td>
                          @else  
                            <td class=" fuente tam-9 tabla-sin-borde-right" style="text-align: right">{{number_format($montoAnticiposTotal, 2, ',','.')}}</td>
                          @endif
                          
                      </tr>
                      <tr>
                        @if($descuentosAnticiposTotal == 0)
                          <td class=" fuente tam-9 tabla-sin-borde-right col-lg-1" style="text-align: right">-</td>
                        @else  
                          <td class=" fuente tam-9 tabla-sin-borde-right" style="text-align: right">-{{number_format($descuentosAnticiposTotal, 2, ',','.')}}</td>
                        @endif
                      </tr>
                      <tr>
                        @if($diferenciaAnticipos == 0)
                          <td class=" fuente tam-9 tabla-sin-borde-right col-lg-1" style="text-align: right">-</td>
                        @else  
                          <th class=" fuente tam-9 tabla-sin-borde-right" style="text-align: right">{{number_format($diferenciaAnticipos, 2, ',','.')}}</th>
                        @endif
                          
                      </tr>
                  </table> 
              </td>
          </tr> 
      </table>
      <table style="width: 100%; page-break-inside: avoid;" class=" fuente tam-9">
          <tr>
              <td style="width: 54%;" class="col-lg-1 tabla tabla-sin-borde-right tabla-sin-borde-top fuente tam-9">
                  ADELANTOS Y DESCUENTOS
              </td>
              <td style="width: 25%; padding-top: 10px; padding-right: 5px" class="tabla tabla-sin-borde-right tabla-sin-borde-left tabla-sin-borde-top">
                  <table style="width: 100%;">
                      <tr>
                          <td></td>
                          <td class=" fuente tam-9 tabla-sin-borde-right" style="text-align: right">ADELANTOS:&nbsp;</td>
                      </tr>
                      <tr>
                          <td class=" fuente tam-9 tabla-sin-borde-right" style="text-align: right">DESCUENTOS:&nbsp;</td>
                      </tr>
                      <tr>
                          <td class=" fuente tam-9 tabla-sin-borde-right" style="text-align: right">SUBTOTAL ADELANTOS Y DESCUENTOS:&nbsp;</td>
                      </tr>
                  </table> 
              </td>
              <td style="width: 7%; padding-top: 10px" class="tabla tabla-sin-borde-right tabla-sin-borde-top tabla-sin-borde-left">
                  <table style="width: 100%;">
                      <tr>
                          <td></td>
                          @if($montoAdelantosTotal_Anterior == 0)
                            <td class=" fuente tam-9 tabla-sin-borde-right col-lg-1" style="text-align: right">-</td>
                          @else 
                            <td class=" fuente tam-9 tabla-sin-borde-right" style="text-align: right">{{number_format($montoAdelantosTotal_Anterior, 2, ',','.')}}</td>
                          @endif
                      </tr>
                      <tr>
                          @if($descuentosAdelantosTotal_Anterior == 0)
                            <td class="tabla fuente tam-9 tabla-sin-borde-right tabla-sin-borde-left tabla-sin-borde-top col-lg-1" style="text-align: right">-</td>
                          @else 
                            <td class="tabla fuente tam-9 tabla-sin-borde-right tabla-sin-borde-left tabla-sin-borde-top" style="text-align: right">-{{number_format($descuentosAdelantosTotal_Anterior, 2, ',','.')}}</td>
                          @endif
                      </tr>
                      <tr>
                          @if($diferenciaAdelantos_Anterior == 0)
                            <td class="fuente tam-9 tabla-sin-borde-right col-lg-1" style="text-align: right">-</td>
                          @else 
                            <td class=" fuente tam-9 tabla-sin-borde-right" style="text-align: right">{{number_format($diferenciaAdelantos_Anterior, 2, ',','.')}}</td>
                          @endif
                      </tr>
                  </table> 
              </td>
              <td style="width: 7%; padding-top: 10px" class="tabla tabla-sin-borde-right tabla-sin-borde-top tabla-sin-borde-left">
                  <table style="width: 100%;">
                      <tr>
                          <td></td>
                          @if($montoAdelantosValuacion == 0)
                            <td class=" fuente tam-9 tabla-sin-borde-right col-lg-1" style="text-align: right">-</td>
                          @else 
                            <td class=" fuente tam-9 tabla-sin-borde-right" style="text-align: right">{{number_format($montoAdelantosValuacion, 2, ',','.')}}</td>
                          @endif
                      </tr>
                      <tr>
                          @if($descuentosAdelantosValuacion == 0)
                            <td class="tabla fuente tam-9 tabla-sin-borde-right tabla-sin-borde-left tabla-sin-borde-top col-lg-1" style="text-align: right">-</td>
                          @else 
                            <td class="tabla fuente tam-9 tabla-sin-borde-right tabla-sin-borde-left tabla-sin-borde-top" style="text-align: right">-{{number_format($descuentosAdelantosValuacion, 2, ',','.')}}</td>
                          @endif
                      </tr>
                      <tr>
                          @if($diferenciaAdelantosValuacion == 0)
                            <td class=" fuente tam-9 tabla-sin-borde-right col-lg-1" style="text-align: right">-</td>
                          @else 
                            <td class=" fuente tam-9 tabla-sin-borde-right" style="text-align: right">{{number_format($diferenciaAdelantosValuacion, 2, ',','.')}}</td>
                          @endif
                      </tr>
                  </table> 
              </td>
              <td style="width: 7%; padding-top: 10px" class="tabla  tabla-sin-borde-top tabla-sin-borde-left">
                  <table style="width: 100%;">
                      <tr>
                          <td></td>
                          @if($montoAdelantosTotal == 0)
                            <td class=" fuente tam-9 tabla-sin-borde-right col-lg-1" style="text-align: right">-</td>
                          @else 
                            <td class=" fuente tam-9 tabla-sin-borde-right" style="text-align: right">{{number_format($montoAdelantosTotal, 2, ',','.')}}</td>
                          @endif
                      </tr>
                      <tr>
                          @if($descuentosAdelantosTotal == 0)
                            <td class=" tabla fuente tam-9 tabla-sin-borde-right tabla-sin-borde-left tabla-sin-borde-top col-lg-1" style="text-align: right">-</td>
                          @else 
                            <td class="tabla fuente tam-9 tabla-sin-borde-right tabla-sin-borde-left tabla-sin-borde-top" style="text-align: right">-{{number_format($descuentosAdelantosTotal, 2, ',','.')}}</td>
                          @endif
                      </tr>
                      <tr>
                          @if($diferenciaAdelantos == 0)
                            <td class=" fuente tam-9 tabla-sin-borde-right col-lg-1" style="text-align: right">-</td>
                          @else 
                            <td class=" fuente tam-9 tabla-sin-borde-right" style="text-align: right">{{number_format($diferenciaAdelantos, 2, ',','.')}}</td>
                          @endif
                      </tr>
                  </table> 
              </td>
          </tr> 
      </table>
      <table style="width: 100%; page-break-inside: avoid;" class=" fuente tam-9">
          <tr>
              <td style="width: 88%; padding-right: 5px; text-align: right" class="col-lg-1 tabla fuente tam-9 tabla-sin-borde-right tabla-sin-borde-top">
                  MONTO TOTAL NETO CON IVA:
              </td>
              <td style="width: 7%; text-align: right" class="tabla fuente tam-9 tabla-sin-borde-right tabla-sin-borde-top tabla-sin-borde-left">
                  {{number_format($Total_MontoEjecutado_conIVA_Neto, 2, ',','.')}}
              </td>
              <td style="width: 7%; text-align: right" class="tabla fuente tam-9 tabla-sin-borde-left tabla-sin-borde-top">
              </td>
          </tr> 
      </table>
    
  <!--  - - - - - - PIE - - - - - -  -->
<!--  - - - - - - - - - - - - - - - - -  -->

   <div id="footer">
    <?php
          $montoPagarIdeal = $MontoActualIdeal + $diferenciaAdelantosValuacion;
          $diferenciaMontoPagar = $montoPagarIdeal - $montoPagarValuacion;
          if ($diferenciaMontoPagar < 1) {
            $montoPagarValuacion = $montoPagarValuacion + $diferenciaMontoPagar;
          }
      ?>
      <table style="width: 100%; page-break-inside: avoid;" class=" fuente tam-9">
          <tr>
              <td style="width: 9%; padding-right: 5px; text-align: right" class=" tabla fuente tam-9">
                  <table style="width: 100%;">
                      <tr>
                          <td></td>
                          <td class=" fuente tam-9 tabla-sin-borde-bottom" style="text-align: center">
                            Fecha de Pago:
                          </td>
                      </tr>
                      <tr>
                          <td class=" fuente tam-9" style="text-align: center">
                            {{date('d-m-Y', strtotime($valuacion->fecha_Pago))}}
                          </td>
                      </tr>
                  </table>
              </td>
              <td style="width: 11%; text-align: center" class="tabla fuente tam-9 tabla-sin-borde-right ">
                  VALOR DEL CONTRATO SIN IVA
              </td>
              <th style="width: 17%; text-align: center" class="tabla fuente tam-12 tabla-sin-borde-left ">
                  {{number_format($valorContrato, 2, ',','.')}}
              </th>
              <td style="width: 8%; text-align: center" class="tabla fuente tam-9 tabla-sin-borde-right ">
                  AVANCE FÍSICO:
              </td>
              <th style="width: 6%; text-align: center" class="tabla fuente tam-12 tabla-sin-borde-left ">
                  {{number_format($valuacion->avance_fisico, 2, ',','.')}}%
              </th>
              <td style="width: 8%; text-align: center" class="tabla fuente tam-9 tabla-sin-borde-right ">
                  AVANCE FINANCIERO:
              </td>
              <th style="width: 6%; text-align: center" class="tabla fuente tam-12 tabla-sin-borde-left ">
                  {{number_format($valuacion->avance_financiero, 2, ',','.')}}%
              </th>
              <td style="width: 17.5%; text-align: center; background-color: #c6d9f1" class="tabla fuente tam-9">
                  MONTO NETO A PAGAR EN EL PRESENTE PERIODO SIN IVA:
              </td>
              <th style="width: 17.5%; text-align: center; background-color: #c6d9f1" class="tabla fuente tam-12">
                  {{number_format($montoPagarValuacion, 2, ',','.')}}
              </th>
          </tr> 
      </table>
      <table style="width: 100%" >
          <tr>
              @foreach($firmantes_cliente as $firmante) 
                  @if($contador == $nro_firmas-1) 
                      <td style="text-align: left; width: {{$porcentaje_posicion}}%; padding-left: 5px" class="fuente tabla tam-9 tabla-sin-borde-top">
                        {{$firmante->accion}}<br>
                        {{$firmante->firmante->nombre}} {{$firmante->firmante->apellido}}<br>
                        @if($firmante->empresa == 1)
                            {{$valuacion->contrato->proyecto->empresa->nombre_Empresa}}
                        @else
                            {{$valuacion->contrato->empresaProveedor->nombre_Empresa}}
                        @endif
                      </td>
                  @else    
                      <td style="text-align: left; width: {{$porcentaje_posicion}}%; padding-left: 5px" class="fuente tabla tam-9 tabla-sin-borde-right tabla-sin-borde-top">
                        {{$firmante->accion}}<br>
                        {{$firmante->firmante->nombre}} {{$firmante->firmante->apellido}}<br>
                        @if($firmante->empresa == 1)
                            {{$valuacion->contrato->proyecto->empresa->nombre_Empresa}}
                        @else
                            {{$valuacion->contrato->empresaProveedor->nombre_Empresa}}
                        @endif
                      </td>
                  @endif    
                  <?php $contador++?>
              @endforeach 
              @foreach($firmantes_proveedor as $firmante) 
                  @if($contador == $nro_firmas-1) 
                      <td style="text-align: left; width: {{$porcentaje_posicion}}%; padding-left: 5px" class="fuente tabla tam-9 tabla-sin-borde-top">
                        {{$firmante->accion}}<br>
                        {{$firmante->firmante->nombre}} {{$firmante->firmante->apellido}}<br>
                        @if($firmante->empresa == 1)
                            {{$valuacion->contrato->proyecto->empresa->nombre_Empresa}}
                        @else
                            {{$valuacion->contrato->empresaProveedor->nombre_Empresa}}
                        @endif
                      </td>
                  @else    
                      <td style="text-align: left; width: {{$porcentaje_posicion}}%; padding-left: 5px" class="fuente tabla tam-9 tabla-sin-borde-right tabla-sin-borde-top">
                        {{$firmante->accion}}<br>
                        {{$firmante->firmante->nombre}} {{$firmante->firmante->apellido}}<br>
                        @if($firmante->empresa == 1)
                            {{$valuacion->contrato->proyecto->empresa->nombre_Empresa}}
                        @else
                            {{$valuacion->contrato->empresaProveedor->nombre_Empresa}}
                        @endif
                      </td>
                  @endif    
                  <?php $contador++?>
              @endforeach 
          </tr>
      </table> 
   </div>
<!--  - - - - - - FIN PIE - - - - - -  -->
<!--  - - - - - - - - - - - - - - - - - -->
  </body>

</html>
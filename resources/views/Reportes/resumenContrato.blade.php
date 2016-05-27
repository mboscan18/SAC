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

        $pos_header = 270 + $aumentoHeader;
        $tam_header = $pos_header - 20;
        $margin_header = $pos_header + 45;


        $pos_footer = 175;
        $tam_footer = $pos_footer - 20;
        $margin_footer = $pos_footer - 50;
 
      ?> 
      <style>
         @page { margin-bottom: {{$margin_footer}}px; margin-top: {{$margin_header}}px }
         #header { position: fixed; left: 0px; background-color: transparent; top: -{{$pos_header}}px; right: 0px; height: {{$tam_header}}px;}
         #footer .page:after { content: counter(page, upper); }
      </style>
  </head>

  <body>

  <!--  - - - - - - CABECERA - - - - - -  -->
  <!--  - - - - - - - - - - - - - - - - -  -->
      <div id="header">
          <div class="row col-lg-12">
                  <table   style="width: 100%;">
                        <tr>
                          <td></td>
                            <td style="text-align: center; width:16%; padding-bottom: 5px; padding-top: 5px" class="tabla tabla-sin-borde-right">
                                @if($contrato->proyecto->empresa->logo == null)
                                  No image
                                @else  
                                  <img src="{{getcwd()}}\archivos\{{$contrato->proyecto->empresa->logo}}" alt="" style="height: 60px"/>
                                @endif  
                            </td>
                            <td style="text-align: left; width:24%" class="tabla tabla-sin-borde-left tam-10">
                              {{$contrato->proyecto->empresa->nombre_Empresa}}<br>
                              {{$contrato->proyecto->empresa->codIdentificacion_Empresa}}<br>
                            </td>
                            <td style="width:30%; text-align: center" class="tabla tam-14">
                                  RESUMEN GENERAL DE VALUACIONES
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
                                      <td style="width:50%; text-align: center; " class="tabla fuente tam-10 tabla tabla-sin-borde-left tabla-sin-borde-top">{{$contrato->nro_Contrato}}</td>
                                    </tr>
                                </table>
                                <table style="width: 100%" >    
                                    <tr>
                                      <td style="width:50%; text-align: center; color: #234a77" class="tabla fuente tam-10 tabla tabla-sin-borde-right tabla-sin-borde-top">Contratista</td>
                                      <td style="width:50%; text-align: center;" class="tabla fuente tam-10 tabla tabla-sin-borde-left tabla-sin-borde-top">{{$contrato->empresaProveedor->nombre_Empresa}}</td>
                                    </tr>
                                </table>
                                <table style="width: 100%" >    
                                    <tr>
                                      <td style="width:50%; text-align: center; color: #234a77" class="tabla fuente tam-10 tabla tabla-sin-borde-right tabla-sin-borde-top">RIF</td>
                                      <td style="width:50%; text-align: center;" class="tabla fuente tam-10 tabla tabla-sin-borde-left tabla-sin-borde-top">{{$contrato->empresaProveedor->codIdentificacion_Empresa}}</td>
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
              <th style="width: 6%; border-top-style: double; border-top-width: 3px; border-bottom-width: 1px" class="tabla fuente tam-9 tabla-sin-borde-right ">&nbsp;PROYECTO:</th>
              <td style="width: 94%; border-top-style: double; border-top-width: 3px; border-bottom-width: 1px; padding-left: 3px" class="tabla fuente tam-9 tabla-sin-borde-left">
                  @foreach($proyectoDescripcion as $descripcion)
                      {{strtoupper($descripcion)}}
                  @endforeach
              </td>
            </tr>
        </table>  
        <table style="width: 100%;">
            <tr>
              <th style="width: 13%; margin-left: 3px; border-bottom-width: 1px" class="tabla fuente tam-9 tabla-sin-borde-right tabla-sin-borde-top">&nbsp;OBJETO DEL CONTRATO:</th>
              <td style="width: 87%;  border-bottom-width: 1px; padding-left: 1px" class="tabla fuente tam-9 tabla-sin-borde-left tabla-sin-borde-top">
                  @foreach($contratoDescripcion as $descripcion)
                      {{strtoupper($descripcion)}}
                  @endforeach
              </td>
            </tr>
        </table>
        <table style="width: 100%;">
            <tr>
              <th style="width: 13%; margin-left: 3px; border-bottom-style: double; border-bottom-width: 3px" class="tabla fuente tam-9 tabla-sin-borde-right tabla-sin-borde-top">&nbsp;CLIENTE:</th>
              <td style="width: 57%; border-bottom-style: double; border-bottom-width: 3px; padding-left: 3px" class="tabla fuente tam-9 tabla-sin-borde-left tabla-sin-borde-top">
                  {{$contrato->proyecto->empresa->nombre_Empresa}}
              </td>
              <th style="width: 8%; border-bottom-style: double; tabla-sin-borde-right; border-bottom-width: 3px; padding-left: 3px" class="tabla fuente tam-9 tabla-sin-borde-right tabla-sin-borde-left tabla-sin-borde-top">
                  RIF:
              </th>
              <td style="width: 22%; border-bottom-style: double; border-bottom-width: 3px; padding-left: 3px" class="tabla fuente tam-9 tabla-sin-borde-left tabla-sin-borde-top">
                  {{$contrato->proyecto->empresa->codIdentificacion_Empresa}}
              </td>
            </tr>
        </table>
        <!-- FIN NOMBRE PROYECTO -->

        <div style="width=: 100%; height: 25px"></div>

        <!-- VALOR DEL CONTRATO -->

        <table style="width: 100%" class="fuente tam-8">
          <tr>
            <th class="tabla fuente tam-8 tabla-sin-borde" style="height: 15px; width: 47%; text-align: center">&nbsp;</th>
            <th class="tabla fuente tam-8 tabla-sin-borde" style="height: 15px; width: 16%; text-align: center">CONDICIONES DEL CONTRATO</th>
            <?php 
                $tam = $cantRetencion * 6;
                $restante = 37 - $tam;
            ?>
            <th class="tabla fuente tam-8 tabla-sin-borde-bottom" style="height: 15px; width: {{$tam}}%; text-align: center">RETENCIONES</th>
            @if($restante >= 0)
                <th class="tabla fuente tam-8 tabla-sin-borde tabla-sin-borde-top" style="height: 15px; width: {{$restante}}%; text-align: center">&nbsp;</th>
            @endif
          </tr>
        </table> 

        <table style="width: 100%" class="fuente tam-8">
            <thead>
                <tr>
                    <th class="tabla fuente tam-8 tabla-sin-borde" style="width: 5%; text-align: center">&nbsp;</th>
                    <th style="width: 10%; text-align: center">
                      <table style="width: 100%; text-align: center">
                        <tr>
                            <td></td>
                            <th  style="height: 26px; text-align: center" class="tabla fuente tam-8 tabla-sin-borde">&nbsp;</th>
                        </tr>
                        <tr>
                            <th style="height: 25px; width: 100%; text-align: center" class="tabla fuente tam-8 tabla-sin-borde-right">VALOR DEL CONTRATO ORIGINAL:</th>                                    
                        </tr>
                      </table> 
                    </th>
                    <th  style="width: 8%; text-align: center">
                      <table style="width: 100%; text-align: center">
                        <tr>
                            <td></td>
                            <th  style="height: 25px; text-align: center" class="tabla fuente tam-8 tabla-sin-borde-right">{{$contrato->moneda->symbol}} sin IVA</th>
                        </tr>
                        <tr>
                            <th style="height: 25px; width: 100%; text-align: center" class="tabla fuente tam-9 tabla-sin-borde-right">{{number_format($valorContratoInicial, 2, ',','.')}}</th>                                    
                        </tr>
                      </table> 
                    </th>
                    <th  style="width: 8%; text-align: center">
                      <table style="width: 100%; text-align: center">
                        <tr>
                            <td></td>
                            <th  style="height: 25px; text-align: center" class="tabla fuente tam-8 tabla-sin-borde-right">IVA ({{number_format($IVA, 2, ',','.')}}%)</th>
                        </tr>
                        <tr>
                            <th style=" height: 25px; width: 100%; text-align: center" class="tabla fuente tam-9 tabla-sin-borde-right">{{number_format($valorContratoInicial_IVA, 2, ',','.')}}</th>                                    
                        </tr>
                      </table> 
                    </th>
                    <th  style="width: 8%; text-align: center">
                      <table style="width: 100%; text-align: center">
                        <tr>
                            <td></td>
                            <th  style="height: 25px; text-align: center" class="tabla fuente tam-8 ">Total con IVA</th>
                        </tr>
                        <tr>
                            <th style="height: 25px; width: 100%; text-align: center" class="tabla fuente tam-9 ">{{number_format($valorContratoInicial_Total, 2, ',','.')}}</th>                                    
                        </tr>
                      </table> 
                    </th>
                    <th class="tabla fuente tam-8 tabla-sin-borde" style="width: 8%; text-align: center"></th>
                    <th class="tabla fuente tam-8" style="width: 8%; text-align: center">MONTO SIN IVA <br>{{$contrato->moneda->symbol}}</th>
                    <th class="tabla fuente tam-8" style="width: 8%; text-align: center">IVA <br>({{number_format($IVA, 2, ',','.')}}%)</th>
                    @foreach($retencionesContrato as $key)
                    <th  style="width: 6%; text-align: center">
                      <table style="width: 100%; text-align: center">
                        <tr>
                            <td></td>
                            <th  style="height: 25px; text-align: center" class="tabla fuente tam-8 tabla-sin-borde-right">{{$key->retencion->descripcion}}</th>
                        </tr>
                        <tr>
                            <th style="height: 25px; width: 100%; text-align: center" class="tabla fuente tam-9 tabla-sin-borde-right">{{number_format($key->porcentaje, 2, ',','.')}}%</th>                                    
                        </tr>
                      </table> 
                    </th>
                    @endforeach
                    <th class="tabla fuente tam-8" style="width: 8%; text-align: center">NETO A PAGAR <br>{{$contrato->moneda->symbol}}</th>
                    <?php 
                        $tam = 29 - ($cantRetencion * 6);

                    ?>
                    @if($tam >= 0)
                      <th class="tabla fuente tam-8 tabla-sin-borde" style="width: {{$tam}}%; text-align: center">&nbsp;</th>
                    @endif  
                </tr>
            </thead>
        </table>
        <table style="width: 100%" class="fuente tam-8">
            <thead>
                <tr>
                    <th class="tabla fuente tam-8 tabla-sin-borde" style="width: 5%; text-align: center">&nbsp;</th>
                    <th style="height: 25px; width: 10%; text-align: center" class="tabla fuente tam-8 tabla-sin-borde-right tabla-sin-borde-top">VALOR DEL CONTRATO ACTUAL:</th>                                    
                    <th style="height: 25px; width: 8%; text-align: center" class="tabla fuente tam-9 tabla-sin-borde-right tabla-sin-borde-top">{{number_format($valorContrato, 2, ',','.')}}</th>                                    
                    <th style=" height: 25px; width: 8%; text-align: center" class="tabla fuente tam-9 tabla-sin-borde-right tabla-sin-borde-top">{{number_format($valorContrato_IVA, 2, ',','.')}}</th>                                    
                    <th style="height: 25px; width: 8%; text-align: center" class="tabla fuente tam-9 tabla-sin-borde-top">{{number_format($valorContrato_Total, 2, ',','.')}}</th>                                    
                    
                    <th class="tabla fuente tam-8 tabla-sin-borde" style="width: 8%; text-align: center "></th>
                    <th class="tabla fuente tam-8 tabla-sin-borde-top" style="width: 8%; text-align: center">{{number_format($valorContrato, 2, ',','.')}}</th>
                    <td class="tabla fuente tam-8 tabla-sin-borde-top" style="width: 8%; text-align: center">{{number_format($valorContrato_IVA, 2, ',','.')}}</td>
                   <?php
                        $Total_Retener = 0;
                   ?>
                    @foreach($retencionesContrato as $key)
                      <?php
                          if ($key->retencion->tipo == 1) {
                            $montoRetencion = ($valorContrato * $key->porcentaje) / 100;
                          }elseif ($key->retencion->tipo == 2) {
                            $montoRetencion = ($valorContrato_IVA * $key->porcentaje) / 100;
                          }

                          $sustraendo = $key->sustraendo * $contrato->nroFacturas;

                          $montoRetenido = $montoRetencion - $sustraendo;

                          $Total_Retener = $Total_Retener + $montoRetenido;
                      ?>
                      <td style="height: 25px; width: 6%; text-align: center" class="tabla fuente tam-9 tabla-sin-borde-right tabla-sin-borde-top">{{number_format($montoRetenido, 2, ',','.')}}</td>                                    
                    
                    @endforeach

                    <?php 
                        $tam = 29 - ($cantRetencion * 6);
                        $total_Pagar = $valorContrato_Total - $Total_Retener;
                    ?>
                    <td class="tabla fuente tam-8 tabla-sin-borde-top" style="width: 8%; text-align: center">{{number_format($total_Pagar, 2, ',','.')}}</td>
                    @if($tam >= 0)
                      <th class="tabla fuente tam-8 tabla-sin-borde tabla-sin-borde-top" style="width: {{$tam}}%; text-align: center">&nbsp;</th>
                    @endif  
                </tr>
            </thead>
        </table>

        <!-- FIN VALOR DEL CONTRATO -->

     </div>
<!--  - - - - - - FIN CABECERA - - - - - -  -->
<!--  - - - - - - - - - - - - - - - - - - - -->

   
<!--  - - - - - - PIE - - - - - -  -->
<!--  - - - - - - - - - - - - - - - - -  -->
   <div id="footer">
      
   </div>
<!--  - - - - - - FIN PIE - - - - - -  -->
<!--  - - - - - - - - - - - - - - - - - -->

      <!--  - - - - - - Cabecera de tabla - - - - - -  -->
      <table style="width: 100%" class="fuente tam-8">
          <tr>
            <th class="tabla fuente tam-8 tabla-sin-borde" style="height: 15px; width: 32%; text-align: center">&nbsp;</th>
            <?php 
                $tam = ($cantRetencion * 5);
                $restante = 54 - $tam;
            ?>
            <th class="tabla fuente tam-8 tabla-sin-borde-bottom" style="height: 15px; width: {{$tam}}%; text-align: center">RETENCIONES</th>
            @if($restante >= 0)
                <th class="tabla fuente tam-8 tabla-sin-borde " style="height: 15px; width: {{$restante}}%; text-align: center">&nbsp;</th>
            @endif
            <th class="tabla fuente tam-8 tabla-sin-borde-bottom" style="height: 15px; width: 14%; text-align: center">PAGOS REALIZADOS</th>

          </tr>
      </table> 

      <table style="width: 100%" class="fuente tam-8">
          <thead>
            <tr >
                <th class="tabla fuente tam-8" style="width: 4.5%; text-align: center">NRO BOLETIN</th>
                <th class="tabla fuente tam-8 tabla-sin-borde-right" style="width: 5.5%; text-align: center">NRO VALUACION</th>
                <th style="width: 10%; text-align: center">
                  <table style="width: 100%; text-align: center">
                    <tr>
                        <td></td>
                        <th colspan="2" style="height: 24px; text-align: center" class="tabla fuente tam-8 tabla-sin-borde-right">PERIODOS BOLETIN</th>
                    </tr>
                    <tr>
                        <th style="height: 12px; width: 50%; text-align: center" class="tabla fuente tam-8 tabla-sin-borde-right">DESDE</th>                                    
                        <th style="height: 12px; width: 50%; text-align: center" class="tabla fuente tam-8 tabla-sin-borde-right">HASTA</th>                                    
                    </tr>
                  </table> 
                </th>
                <th class="tabla fuente tam-8" style="width: 7%; text-align: center">MONTO SIN IVA</th>
                <th class="tabla fuente tam-8" style="width: 5%; text-align: center">IVA</th>
                @foreach($retencionesContrato as $key)
                    <th  style="width: 5%; text-align: center">
                      <table style="width: 100%; text-align: center">
                        <tr>
                            <td></td>
                            <th  style="height: 24px; text-align: center" class="tabla fuente tam-8 tabla-sin-borde-right">{{$key->retencion->descripcion}}</th>
                        </tr>
                        <tr>
                            <th style=" height: 12px; width: 100%; text-align: center" class="tabla fuente tam-8 tabla-sin-borde-right">{{number_format($key->porcentaje, 2, ',','.')}}%</th>                                    
                        </tr>
                      </table> 
                    </th>
                @endforeach
                <th style="width: 7%; text-align: center">
                  <table style="width: 100%; text-align: center">
                    <tr>
                        <td></td>
                        <th style="height: 24px; text-align: center" class="tabla fuente tam-8 tabla-sin-borde-right">ANTICIPO DE OBRA</th>
                    </tr>
                    <tr>
                        <th style="height: 12px;  text-align: center" class="tabla fuente tam-8 tabla-sin-borde-right">30%</th>                                    
                    </tr>
                  </table> 
                </th>
                <th style="width: 6%; text-align: center">
                  <table style="width: 100%; text-align: center">
                    <tr>
                        <td></td>
                        <th style="height: 24px; text-align: center" class="tabla fuente tam-8 tabla-sin-borde-right">ADELANTOS</th>
                    </tr>
                    <tr>
                        <th style="height: 12px;  text-align: center" class="tabla fuente tam-8 tabla-sin-borde-right">X Valuacion</th>                                    
                    </tr>
                  </table> 
                </th>
                <th style="width: 6%; text-align: center">
                  <table style="width: 100%; text-align: center">
                    <tr>
                        <td></td>
                        <th style="height: 24px; text-align: center" rows=2 class="tabla fuente tam-8 tabla-sin-borde-right">DESCUENTOS</th>
                    </tr>
                    <tr>
                        <th style="height: 12px;  text-align: center" class="tabla fuente tam-8 tabla-sin-borde-right">X Valuacion</th>                                    
                    </tr>
                  </table> 
                </th>
                <th class="tabla fuente tam-8" style="width: 7%; text-align: center; background-color: #c6d9f1">NETO A PAGAR</th>
                <th class="tabla fuente tam-8" style="width: 7%; text-align: center">SALDO CONTRATO</th>
                <?php 
                    $tam = ($cantRetencion * 5);
                    $restante = 21 - $tam;
                ?>
                <th class="tabla fuente tam-8 tabla-sin-borde" style="width: {{$restante}}%; text-align: center">&nbsp;</th>

                <th class="tabla fuente tam-8" style="width: 7%; text-align: center">MONTO PAGADO</th>
                <th class="tabla fuente tam-8" style="width: 7%; text-align: center">DIFERENCIA</th>
                
            </tr>    
          </thead>       
      </table>
      <!--  - - - - - - Fin Cabecera de tabla - - - - - -  -->

      <!--  - - - - - - Cuerpo de tabla - - - - - -  -->
      <?php
          $saldoContrato = $total_Pagar;
          $acumPagado = 0;
          $acumAnticipo = 0;
          $acumValuado = 0;
          $acumPagar = 0;
          $acumDiferencia = 0;
          $acumIVA = 0;
          $acumRetencion = array();
          $acumAdelanto = 0;
          $acumDescuento = 0;

          for ($i=0; $i < $cantRetencion; $i++) { 
            $acumRetencion[$i] = 0;
          }
      ?>
     @foreach($resumenValuaciones as $key)
        <table style="width: 100%" class="fuente tam-8">
          <thead>
            <tr >
                <td class="tabla fuente tam-8 tabla-sin-borde-top tabla-sin-borde-right" style="width: 4.5%; text-align: center">{{$key->nro_Boletin}}</td>
                <td class="tabla fuente tam-8 tabla-sin-borde-top tabla-sin-borde-right" style="width: 5.5%; text-align: center">{{$key->nro_Valuacion}}</td>
                <td class="tabla fuente tam-8 tabla-sin-borde-top tabla-sin-borde-right" style="width: 5%; text-align: center">{{date('d-m-Y', strtotime($key->periodo_inicio))}}</td>
                <td class="tabla fuente tam-8 tabla-sin-borde-top tabla-sin-borde-right" style="width: 5%; text-align: center">{{date('d-m-Y', strtotime($key->periodo_fin))}}</td>
                <td class="tabla fuente tam-8 tabla-sin-borde-top tabla-sin-borde-right" style="width: 7%; text-align: center">{{number_format($key->monto_Valuado, 2, ',','.')}}</td>
                <td class="tabla fuente tam-8 tabla-sin-borde-top tabla-sin-borde-right" style="width: 5%; text-align: center">{{number_format($key->monto_IVA, 2, ',','.')}}</td>
                <?php
                    $i=0;
                    $str = 'retencion_';
                ?>
                @foreach($retencionesContrato as $ret)
                    <?php
                        $retencion = $str.$i;
                        $acumRetencion[$i] = $acumRetencion[$i] + $key->$retencion;
                        $i++;
                    ?>
                    @if($key->$retencion == 0)
                      <td class="tabla fuente tam-8 tabla-sin-borde-top tabla-sin-borde-right" style="width: 5%; text-align: center"> - </td>
                    @else
                      <td class="tabla fuente tam-8 tabla-sin-borde-top tabla-sin-borde-right" style="width: 5%; text-align: center">{{number_format($key->$retencion, 2, ',','.')}}</td>
                    @endif  

               @endforeach
                <td class="tabla fuente tam-8 tabla-sin-borde-top tabla-sin-borde-right" style="width: 7%; text-align: center">{{number_format($key->anticipo, 2, ',','.')}}</td>
                <td class="tabla fuente tam-8 tabla-sin-borde-top tabla-sin-borde-right" style="width: 6%; text-align: center">{{number_format($key->adelantos, 2, ',','.')}}</td>
                <td class="tabla fuente tam-8 tabla-sin-borde-top tabla-sin-borde-right" style="width: 6%; text-align: center">{{number_format(($key->descuentos * -1), 2, ',','.')}}</td>
                
                <td class="tabla fuente tam-8 tabla-sin-borde-top tabla-sin-borde-right" style="width: 7%; text-align: center">{{number_format($key->neto_Pagar, 2, ',','.')}}</td>
                <?php
                  // Totales
                    $saldoContrato = $saldoContrato - $key->neto_Pagar;
                    $acumPagar = $acumPagar + $key->neto_Pagar;
                    $acumAnticipo = $acumAnticipo + $key->anticipo;
                    $acumValuado = $acumValuado + $key->monto_Valuado;
                    $acumPagado = $acumPagado + $key->monto_pagado;
                    $acumDiferencia = $acumDiferencia + $key->diferencia_pago;
                    $acumIVA = $acumIVA + $key->monto_IVA;
                    $acumAdelanto = $acumAdelanto + $key->adelantos;
                    $acumDescuento = $acumDescuento + ($key->descuentos * -1);
                ?>
                <td class="tabla fuente tam-8 tabla-sin-borde-top" style="width: 7%; text-align: center">{{number_format($saldoContrato, 2, ',','.')}}</td>
                <?php 
                    $tam = ($cantRetencion * 5);
                    $restante = 21 - $tam;
                ?>
                <td class="tabla fuente tam-8 tabla-sin-borde" style="width: {{$restante}}%; text-align: center">&nbsp;</td>

                <td class="tabla fuente tam-8 tabla-sin-borde-top tabla-sin-borde-right" style="width: 7%; text-align: center">{{number_format($key->monto_pagado, 2, ',','.')}}</td>
                <td class="tabla fuente tam-8 tabla-sin-borde-top " style="height: 20px; width: 7%; text-align: center">{{number_format($key->diferencia_pago, 2, ',','.')}}</td>
                
            </tr>    
          </thead>       
        </table>
     @endforeach
      <!--  - - - - - - Fin Cuerpo de tabla - - - - - -  -->

      <table style="width: 100%" class="fuente tam-8">
          <thead>
            <tr >
                <td class="tabla fuente tam-8 tabla-sin-borde" style="width: 20%; text-align: center">&nbsp;</td>
                <td class="tabla fuente tam-8 " style="width: 7%; text-align: center; background-color: #c6d9f1">{{number_format($acumValuado, 2, ',','.')}}</td>
                <td class="tabla fuente tam-8 " style="width: 5%; text-align: center; background-color: #c6d9f1">{{number_format($acumIVA, 2, ',','.')}}</td>
                <?php 
                    $tam = ($cantRetencion * 5);
                    $restante = 21 - $tam + 7;
                    $i = 0;
                ?>
                @foreach($retencionesContrato as $ret)
                    @if($acumRetencion[$i] == 0)
                      <td class="tabla fuente tam-8  " style="width: 5%; text-align: center; background-color: #c6d9f1"> - </td>
                    @else
                      <td class="tabla fuente tam-8  " style="width: 5%; text-align: center; background-color: #c6d9f1">{{number_format($acumRetencion[$i], 2, ',','.')}}</td>
                    @endif  
                    <?php
                        $i++;
                    ?>
               @endforeach
                
                <td class="tabla fuente tam-8 " style="width: 7%; text-align: center; background-color: #c6d9f1">{{number_format($acumAnticipo, 2, ',','.')}}</td>
                <td class="tabla fuente tam-8 " style="width: 6%; text-align: center; background-color: #c6d9f1">{{number_format($acumAdelanto, 2, ',','.')}}</td>
                <td class="tabla fuente tam-8 " style="width: 6%; text-align: center; background-color: #c6d9f1">{{number_format($acumDescuento, 2, ',','.')}}</td>
                <td class="tabla fuente tam-8 " style="width: 7%; text-align: center; background-color: #c6d9f1">{{number_format($acumPagar, 2, ',','.')}}</td>

                <td class="tabla fuente tam-8 tabla-sin-borde" style="width: {{$restante}}%; text-align: center">&nbsp;</td>
                <td class="tabla fuente tam-8 " style="width: 7%; text-align: center; background-color: #c6d9f1">{{number_format($acumPagado, 2, ',','.')}}</td>
                <td class="tabla fuente tam-8 " style="height: 20px; width: 7%; text-align: center; background-color: #c6d9f1">{{number_format($acumDiferencia, 2, ',','.')}}</td>
                
            </tr>    
          </thead>       
        </table>
    
    
  </body>
</html>
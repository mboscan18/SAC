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


        
        $pos_header = 90 ;
        $tam_header = $pos_header - 20;
        $margin_header = $pos_header + 45;


        $pos_footer = 175;
        $tam_footer = $pos_footer - 20;
        $margin_footer = $pos_footer - 50;
 
      ?> 
      <style>
         @page { margin-bottom: {{$margin_footer}}px; margin-top: {{$margin_header}}px }
         #header { position: fixed; left: 0px; background-color: transparent; top: -{{$pos_header}}px; right: 0px; height: {{$tam_header}}px;}
         #footer { position: fixed; left: 0px; background-color: transparent; bottom: -{{$pos_footer}}px; right: 0px; height: {{$tam_footer}}px; padding-bottom: 20px;}
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
                            <td style="text-align: center; width:14%; padding-bottom: 5px; padding-top: 5px" class="tabla tabla-sin-borde-right">
                                @if($contrato->proyecto->empresa->logo == null)
                                  No image
                                @else  
                                  <img src="{{getcwd()}}\archivos\{{$contrato->proyecto->empresa->logo}}" alt="" style="height: 40px"/>
                                @endif  
                            </td>
                            <td style="text-align: left; width:22%" class="tabla tabla-sin-borde-left tam-10">
                              {{$contrato->proyecto->empresa->nombre_Empresa}}<br>
                              {{$contrato->proyecto->empresa->codIdentificacion_Empresa}}<br>
                            </td>
                            <th style="width:38%; text-align: center" class="tabla tam-12">
                                  RESUMEN DE DATOS FINANCIEROS DEL SUBCONTRATO
                            </th>
                            <td style="width:30%;" class=" tam-10 tabla ">
                                <table style="width: 100%; " >
                                    <tr>
                                      <th></th>
                                      <th style="width:100%; text-align: center; height: 20px" class="fuente tam-12 tabla tabla-sin-borde-top tabla-sin-borde-right tabla-sin-borde-left">NÚMERO <br></th>
                                      <th style="width:100%; text-align: center; " class="fuente tam-12 tabla tabla-sin-borde-top tabla-sin-borde-right">VIGENCIA <br></th>
                                    </tr>
                                    <tr>
                                      <td style="width:100%; text-align: center; height: 20px" class="fuente tam-12 tabla tabla-sin-borde-bottom tabla-sin-borde-right tabla-sin-borde-left tabla-sin-borde-top">F-DO-P&H-152</td>
                                      <td style="width:100%; text-align: center; " class="fuente tam-12 tabla tabla-sin-borde-bottom tabla-sin-borde-right">28/03/2016</td>
                                    </tr>
                                </table>
                            </td>
                        </tr> 
                  </table>
                  
              </div>

        <!-- FIN VALOR DEL CONTRATO -->

     </div>
<!--  - - - - - - FIN CABECERA - - - - - -  -->
<!--  - - - - - - - - - - - - - - - - - - - -->

   
<!--  - - - - - - PIE - - - - - -  -->
<!--  - - - - - - - - - - - - - - - - -  -->
   <div id="footer">
      <table style="width: 100%" >
          <tr>
              <td style="width: 50%; text-align: left; padding-left: 5px" colspan="1" class="fuente tabla ">APROBADO POR:<br>Gerencia de Operaciones<br><br><br></td>
              <td style="width: 50%; text-align: left; padding-left: 5px" colspan="1" class="fuente tabla ">APROBADO POR:<br>Gerencia de Finanzas<br><br><br></td>
          </tr>
      </table> 
   </div>
<!--  - - - - - - FIN PIE - - - - - -  -->
<!--  - - - - - - - - - - - - - - - - - -->

        <!-- DATOS DEL CONTRATISTA -->
        <table style="width: 100%">
            <tr>
              <th style="text-align: center; background-color: #c6d9f1;" class="fuente tam-13 tabla tabla-sin-borde-bottom">DATOS DEL SUBCONTRATISTA:</th>
            </tr>
        </table>  

        <table style="width: 100%">
            <tr>
              <th style="text-align: center; width: 25%" class="fuente tam-12 tabla tabla tabla-sin-borde-bottom">NOMBRE DE EMPRESA:</th>
              <td style="text-align: center; width: 75%" class="fuente tam-12 tabla tabla tabla-sin-borde-bottom">{{$contrato->empresaProveedor->nombre_Empresa}}</td>
            </tr>
        </table> 

        <table style="width: 100%">
            <tr>
              <th style="text-align: center; width: 25%" class="fuente tam-12 tabla tabla tabla-sin-borde-bottom">RIF:</th>
              <td style="text-align: center; width: 25%" class="fuente tam-12 tabla tabla tabla-sin-borde-bottom">{{$contrato->empresaProveedor->codIdentificacion_Empresa}}</td>
              <th style="text-align: center; width: 25%" class="fuente tam-12 tabla tabla tabla-sin-borde-bottom">TELÉFONO:</th>
              <td style="text-align: center; width: 25%" class="fuente tam-12 tabla tabla tabla-sin-borde-bottom">{{$contrato->empresaProveedor->telefono}}</td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
              <th style="text-align: center; width: 25%" class="fuente tam-12 tabla tabla tabla-sin-borde-bottom">DIRECCIÓN:</th>
              <td style="text-align: center; width: 75%" class="fuente tam-12 tabla tabla tabla-sin-borde-bottom">{{$contrato->empresaProveedor->direccion}}</td>
            </tr>
        </table> 

        <table style="width: 100%">
            <tr>
              <th style="text-align: center; width: 25%" class="fuente tam-12 tabla tabla ">REPRESENTANTE LEGAL:</th>
              <td style="text-align: center; width: 75%" class="fuente tam-12 tabla tabla ">{{$contrato->empresaProveedor->nombreContacto}}</td>
            </tr>
        </table> 
        <!-- DATOS DEL CONTRATISTA -->
        <br><br>

        <!-- DATOS DEL PROYECTO -->
        <table style="width: 100%">
            <tr>
              <th style="text-align: center; background-color: #c6d9f1;" class="fuente tam-13 tabla tabla-sin-borde-bottom">DATOS DEL PROYECTO:</th>
            </tr>
        </table>  

        <table style="width: 100%">
            <tr>
              <th style="text-align: center; width: 25%" class="fuente tam-12 tabla ">NOMBRE DEL PROYECTO:<br>&nbsp;</th>
              <td style="text-align: center; width: 75%" class="fuente tam-12 tabla ">{{$contrato->proyecto->nombre_Proyecto}}</td>
            </tr>
        </table> 
        <!-- DATOS DEL PROYECTO -->
        <br><br>

        <!-- DATOS DEL CONTRATO -->
        <table style="width: 100%">
            <tr>
              <th style="text-align: center; background-color: #c6d9f1;" class="fuente tam-13 tabla tabla-sin-borde-bottom">DATOS GENERALES DEL CONTRATO:</th>
            </tr>
        </table>  

        <table style="width: 100%">
            <tr>
              <th style="text-align: center; width: 25%" class="fuente tam-12 tabla tabla tabla-sin-borde-bottom">NRO. DE CONTRATO:</th>
              <td style="text-align: center; width: 75%" class="fuente tam-12 tabla tabla tabla-sin-borde-bottom">{{$contrato->nro_Contrato}}</td>
            </tr>
        </table> 

        <table style="width: 100%">
            <tr>
              <th style="text-align: center; width: 25%" class="fuente tam-12 tabla tabla tabla-sin-borde-bottom">OBJETO DEL CONTRATO:<br>&nbsp;</th>
              <td style="text-align: center; width: 75%" class="fuente tam-12 tabla tabla tabla-sin-borde-bottom">{{$contrato->descripcion}}</td>
            </tr>
        </table> 

        <table style="width: 100%">
            <tr>
              <th style="text-align: center; width: 25%" class="fuente tam-12 tabla tabla tabla-sin-borde-bottom">FECHA DE INICIO:</th>
              <td style="text-align: center; width: 25%" class="fuente tam-12 tabla tabla tabla-sin-borde-bottom">{{date('d/m/Y', strtotime($contrato->fecha_inicio))}}</td>
              <th style="text-align: center; width: 25%" class="fuente tam-12 tabla tabla tabla-sin-borde-bottom">FECHA DE FIN:</th>
              <td style="text-align: center; width: 25%" class="fuente tam-12 tabla tabla tabla-sin-borde-bottom">{{date('d/m/Y', strtotime($contrato->fecha_fin))}}</td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
              <th style="text-align: center; width: 25%" class="fuente tam-12 tabla tabla tabla-sin-borde-bottom">MONEDA:</th>
              <td style="text-align: center; width: 25%" class="fuente tam-12 tabla tabla tabla-sin-borde-bottom">{{$contrato->moneda->symbol}}</td>
              <th style="text-align: center; width: 25%" class="fuente tam-12 tabla tabla tabla-sin-borde-bottom">ANTICIPO DE OBRA:</th>
              <td style="text-align: center; width: 25%" class="fuente tam-12 tabla tabla tabla-sin-borde-bottom">{{number_format($contrato->porcentajeAnticipo, 2, ',','.')}} %</td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
              <th style="text-align: center; width: 50%" class="fuente tam-12 tabla tabla tabla-sin-borde-bottom">MONTO ORIGINAL DEL CONTRATO:</th>
              <td style="text-align: center; width: 50%" class="fuente tam-12 tabla tabla tabla-sin-borde-bottom"> {{number_format($valorContrato, 2, ',','.')}}</td>
            </tr>
        </table> 

        <table style="width: 100%">
            <tr>
              <th style="text-align: center; width: 50%" class="fuente tam-12 tabla tabla ">FECHA DE FIRMA DE LA ORDEN DE SERVICIO:</th>
              <td style="text-align: center; width: 50%" class="fuente tam-12 tabla tabla ">{{date('d/m/Y', strtotime($contrato->fecha_firma))}}</td>
            </tr>
        </table> 
        <!-- DATOS DEL CONTRATO -->
        <br><br>

        <!-- DATOS DE FACTURACION -->
        <table style="width: 100%">
            <tr>
              <th style="text-align: center; background-color: #c6d9f1;" class="fuente tam-13 tabla tabla-sin-borde-bottom">DATOS GENERALES DE FACTURACIÓN:</th>
            </tr>
        </table>  

        <table style="width: 100%">
            <tr>
              <th style="text-align: center; width: 20%" class="fuente tam-12 tabla tabla ">IVA:</th>
              <td style="text-align: center; width: 20%" class="fuente tam-12 tabla tabla ">{{number_format($contrato->IVA, 2, ',','.')}} %</td>
              <th style="text-align: center; width: 40%" class="fuente tam-12 tabla tabla ">CANTIDAD DE FACTURAS ESTIMADAS:</th>
              <td style="text-align: center; width: 20%" class="fuente tam-12 tabla tabla ">{{$contrato->nroFacturas}}</td>
            </tr>
        </table>
        <!-- DATOS DE FACTURACION -->
    
  </body>
</html>
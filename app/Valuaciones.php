<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;	
use SAC\DetalleValuacion;
use SAC\Anticipos;
use SAC\Descuentos;

use DB;

class Valuaciones extends Model
{
    use SoftDeletes;
    
    protected $table="Valuacion"; 

	protected $fillable = 	[
								'nro_Boletin',				// Es el Nro de boletin.
								'nro_Valuacion',			// Es el numero de valuacion.
								'fecha_Pago', 				// Es la fecha en la que se emite el pago de la valuacion.
								'fecha_Inicio_Periodo', 	// Es la fecha inicial del periodo a valuar.
								'fecha_Fin_Periodo', 		// Es la fecha final del periodo a valuar.
								'observaciones',			// Son observaciones que puedan surgir en una valuacion.
								'avance_fisico',			/* Es el avance fisico. El avance fisico es el porcentaje que 
															   representa la el monto pagado sobre el monto total de una 
															   partida, sin tomar en cuenta los anticipos. */
								'avance_financiero',		/* Es el avance financiero. El avance financiero es el porcentaje 
															   que representa la el monto pagado sobre el monto total de una 
															   partida, tomando en cuenta los anticipos. */
								'contrato_id',				// Es el numero de contrato al que pertenece la valuacion.
								'lista',					// Indica si la valuación está lista para pagar. S = Está lista. N = No está lista.
								'usuario', 					// Es el usuario que agrega la entrada en la tabla.
								'IVA', 						// Es el impuesto que se debe cargar sobre la valuacion.
							];

	protected $dates = ['deleted_at'];	

	/*	
	 *	Consultas Estáticas
	 */

    /*
     * Devuelve todas las valuaciones de un contrato ordenando por numero de Boletin
     */ 
    public static function valuaciones($contrato)
    {
         $data = DB::table('Valuacion')
             ->select('*')
             ->where('contrato_id', $contrato)
             ->orderBy('nro_Boletin')
             ->whereNull('deleted_at')
             ->get();

         return $data;    
    }

    /*
     * Devuelve el monto a pagar en un Boletin
     */ 
    public static function montoBoletin($id_valuacion)
    {
        $valuacion = Valuaciones::find($id_valuacion); 

        $detallesValuacion = $valuacion->detallesValuacion;
        $monto_Valuado = 0;
        foreach ($detallesValuacion as $key) {
            $monto_Valuado = $monto_Valuado + $key->monto;
        }

        $descuentos = $valuacion->descuentos;
        $monto_Descuentos = 0;
        foreach ($descuentos as $key) {
            $monto_Descuentos = $monto_Descuentos + $key->monto_Deduccion;
        }

        $adelantos = $valuacion->anticipos;
        $monto_Adelanto = 0;
        foreach ($adelantos as $key) {
            $monto_Adelanto = $monto_Adelanto + $key->monto_Anticipo;
        }
        
        $monto_Neto = $monto_Valuado + $monto_Adelanto - $monto_Descuentos;

         return $monto_Neto;    
    }

	/*
	 * Devuelve el resumen de un boletin de valuacion
	 */ 
	public static function resumenValuacion($id_valuacion)
	{
		$valuacion = Valuaciones::find($id_valuacion); 

        $detallesValuacion = $valuacion->detallesValuacion;
        $monto_Valuado = 0;
        foreach ($detallesValuacion as $key) {
            $monto_Valuado = $monto_Valuado + $key->monto;
        }

        $descuentos = $valuacion->descuentos;
        $monto_Descuentos = 0;
        $monto_Amortizado = 0;
        foreach ($descuentos as $key) {
            if ($key->tipo_Deduccion == 1) {
                $monto_Amortizado = $monto_Amortizado + $key->monto_Deduccion;
            }elseif ($key->tipo_Deduccion == 2) {
                $monto_Descuentos = $monto_Descuentos + $key->monto_Deduccion;
            }
        }

        $adelantos = $valuacion->anticipos;
        $monto_Adelanto = 0;
        $monto_Anticipo = 0;
        foreach ($adelantos as $key) {
            if ($key->tipo_Anticipo == 1) {
                $monto_Anticipo = $monto_Anticipo + $key->monto_Anticipo;
            }elseif ($key->tipo_Anticipo == 2) {
                $monto_Adelanto = $monto_Adelanto + $key->monto_Anticipo;
            }
        }
        $estadoAnticipo = $monto_Anticipo - $monto_Amortizado;

        $IVA = ($monto_Valuado * $valuacion->IVA) / 100;
        $factura = $valuacion->factura;
        //return $factura;
      //  $retencionesAplicadas = 0;
            $monto_pagado = 0;
        if ($factura != null) {
            $retencionesAplicadas = $factura->retenciones;
            $pagos = $factura->pagos;
            foreach ($pagos as $pago) {
                $monto_pagado = $monto_pagado + $pago->monto_Pago;
            }
        }

        $retenciones = $valuacion->contrato->retenciones;


        $jD =   '{ "id":"'.$valuacion->id.
                '", "nro_Boletin":"'.$valuacion->nro_Boletin.
                '", "nro_Valuacion":"'.$valuacion->nro_Valuacion.
                '", "periodo_inicio":"'.$valuacion->fecha_Inicio_Periodo.
                '", "periodo_fin":"'.$valuacion->fecha_Fin_Periodo.
                '", "monto_Valuado":"'.$monto_Valuado.
                '", "monto_IVA":"'.$IVA;

        $jR = array();
        $acumRetenciones = 0;
        $i = 0;
        foreach ($retenciones as $retencion) {
            $montoRetenido = 0;
            foreach ($retencionesAplicadas as $retencionAplicada) {
                if ($retencionAplicada->retenciones_id == $retencion->retenciones_id) {
                    $montoRetenido = $retencionAplicada->monto_Retenido;
                }
            }
            $jR[$i] = '","retencion_'.$i.'":"'.$montoRetenido;
            $i++;

            $acumRetenciones = $acumRetenciones + $montoRetenido;
        }

            $neto_Pagar = $monto_Valuado + $IVA + $monto_Anticipo + $monto_Adelanto - $monto_Amortizado - $monto_Descuentos - $acumRetenciones;
            $diferencia_pago = $neto_Pagar - $monto_pagado;

        $jF =   '","anticipo":"'.$estadoAnticipo.
                '","adelantos":"'.$monto_Adelanto.
                '","descuentos":"'.$monto_Descuentos.
                '","neto_Pagar":"'.$neto_Pagar.
                '","monto_pagado":"'.$monto_pagado.
                '","diferencia_pago":"'.$diferencia_pago.'"}';  

        $j1 = $jD;








        foreach ($jR as $key) {
            $j1 = $j1.$key;
        }

        $j1 = $j1.$jF;

        for ($i = 0; $i <= 31; ++$i) { 
            $j1 = str_replace(chr($i), "", $j1); 
        }
        $j1 = str_replace(chr(127), "", $j1);

        if (0 === strpos(bin2hex($j1), 'efbbbf')) {
           $j1 = substr($j1, 3);
        }
        $json = json_decode( $j1 );

        $error = json_last_error();
        //return $j1;
        switch(json_last_error()) {
            case JSON_ERROR_NONE:
                return $json;
            break;
            case JSON_ERROR_DEPTH:
                return ' - Excedido tamaño máximo de la pila';
            break;
            case JSON_ERROR_STATE_MISMATCH:
                return ' - Desbordamiento de buffer o los modos no coinciden';
            break;
            case JSON_ERROR_CTRL_CHAR:
                return ' - Encontrado carácter de control no esperado';
            break;
            case JSON_ERROR_SYNTAX:
                return ' - Error de sintaxis, JSON mal formado';
            break;
            case JSON_ERROR_UTF8:
                return ' - Caracteres UTF-8 malformados, posiblemente están mal codificados';
            break;
            default:
                return ' - Error desconocido';
            break;
        }
	}	

  public static function resumenValuacionExtended($id_valuacion)
  {
    $valuacion = Valuaciones::find($id_valuacion); 

        $detallesValuacion = $valuacion->detallesValuacion;
        $monto_Valuado = 0;
        foreach ($detallesValuacion as $key) {
            $monto_Valuado = $monto_Valuado + $key->monto;
        }

        $descuentos = $valuacion->descuentos;
        $monto_Descuentos = 0;
        $monto_Amortizado = 0;
        foreach ($descuentos as $key) {
            if ($key->tipo_Deduccion == 1) {
                $monto_Amortizado = $monto_Amortizado + $key->monto_Deduccion;
            }elseif ($key->tipo_Deduccion == 2) {
                $monto_Descuentos = $monto_Descuentos + $key->monto_Deduccion;
            }
        }

        $adelantos = $valuacion->anticipos;
        $monto_Adelanto = 0;
        $monto_Anticipo = 0;
        foreach ($adelantos as $key) {
            if ($key->tipo_Anticipo == 1) {
                $monto_Anticipo = $monto_Anticipo + $key->monto_Anticipo;
            }elseif ($key->tipo_Anticipo == 2) {
                $monto_Adelanto = $monto_Adelanto + $key->monto_Anticipo;
            }
        }
        $estadoAnticipo = $monto_Anticipo - $monto_Amortizado;

        $IVA = ($monto_Valuado * $valuacion->IVA) / 100;
        $factura = $valuacion->factura;
        //return $factura;
      //  $retencionesAplicadas = 0;
            $monto_pagado = 0;
        if ($factura != null) {
            $retencionesAplicadas = $factura->retenciones;
            $pagos = $factura->pagos;
            foreach ($pagos as $pago) {
                $monto_pagado = $monto_pagado + $pago->monto_Pago;
            }
        }

        $retenciones = $valuacion->contrato->retenciones;

        $fechaPagoBoletin = date('d-m-Y', strtotime($valuacion->factura->fecha_Emision));
        $fechaActual = date('d-m-Y');

        $date1 = date_create($fechaActual);
        $date2 = date_create($fechaPagoBoletin);

        $diasMora = date_diff($date1, $date2);

        $jD =   '{ "idValuacion":"'.$valuacion->id.
                '", "idContrato":"'.$valuacion->contrato->id.
                '", "nombreContrato":"'.$valuacion->contrato->descripcion.
                '", "nombreProveedor":"'.$valuacion->contrato->empresaProveedor->nombre_Empresa.
                '", "idProyecto":"'.$valuacion->contrato->proyecto->id.
                '", "nombreProyecto":"'.$valuacion->contrato->proyecto->nombre_Proyecto.
                '", "diasMora":"'.$diasMora->format('%R%a días').
                '", "fechaPago":"'.$valuacion->factura->fecha_Emision.
                '", "nro_Boletin":"'.$valuacion->nro_Boletin.
                '", "nro_Valuacion":"'.$valuacion->nro_Valuacion.
                '", "periodo_inicio":"'.$valuacion->fecha_Inicio_Periodo.
                '", "periodo_fin":"'.$valuacion->fecha_Fin_Periodo.
                '", "monto_Valuado":"'.$monto_Valuado.
                '", "monto_IVA":"'.$IVA;

        $jR = array();
        $acumRetenciones = 0;
        $i = 0;
        foreach ($retenciones as $retencion) {
            $montoRetenido = 0;
            foreach ($retencionesAplicadas as $retencionAplicada) {
                if ($retencionAplicada->retenciones_id == $retencion->retenciones_id) {
                    $montoRetenido = $retencionAplicada->monto_Retenido;
                }
            }
            $jR[$i] = '","retencion_'.$i.'":"'.$montoRetenido;
            $i++;

            $acumRetenciones = $acumRetenciones + $montoRetenido;
        }

            $neto_Pagar = $monto_Valuado + $IVA + $monto_Anticipo + $monto_Adelanto - $monto_Amortizado - $monto_Descuentos - $acumRetenciones;
            $diferencia_pago = $neto_Pagar - $monto_pagado;

        $jF =   '","anticipo":"'.$estadoAnticipo.
                '","adelantos":"'.$monto_Adelanto.
                '","descuentos":"'.$monto_Descuentos.
                '","neto_Pagar":"'.$neto_Pagar.
                '","monto_pagado":"'.$monto_pagado.
                '","diferencia_pago":"'.$diferencia_pago.'"}';  

        $j1 = $jD;








        foreach ($jR as $key) {
            $j1 = $j1.$key;
        }

        $j1 = $j1.$jF;

        for ($i = 0; $i <= 31; ++$i) { 
            $j1 = str_replace(chr($i), "", $j1); 
        }
        $j1 = str_replace(chr(127), "", $j1);

        if (0 === strpos(bin2hex($j1), 'efbbbf')) {
           $j1 = substr($j1, 3);
        }
        $json = json_decode( $j1 );

        $error = json_last_error();
        //return $j1;
        switch(json_last_error()) {
            case JSON_ERROR_NONE:
                return $json;
            break;
            case JSON_ERROR_DEPTH:
                return ' - Excedido tamaño máximo de la pila';
            break;
            case JSON_ERROR_STATE_MISMATCH:
                return ' - Desbordamiento de buffer o los modos no coinciden';
            break;
            case JSON_ERROR_CTRL_CHAR:
                return ' - Encontrado carácter de control no esperado';
            break;
            case JSON_ERROR_SYNTAX:
                return ' - Error de sintaxis, JSON mal formado';
            break;
            case JSON_ERROR_UTF8:
                return ' - Caracteres UTF-8 malformados, posiblemente están mal codificados';
            break;
            default:
                return ' - Error desconocido';
            break;
        }
  } 

    /*
     * Devuelve 0 si la valuacion no ha sido trabajada
     * Devuelve 1 si la valuacion no ha sido enviada a pagar
     * Devuelve 2 si la valuacion fue enviada a pagar
     * Devuelve 3 si la valuacion fue abonada
     * Devuelve 4 si la valuacion fue pagada en su totalidad
     */ 
    public static function estadoValuacion($valuacion)
    {
        $valuacion = Valuaciones::find($valuacion);
        $valuacionIsTrabajada = Valuaciones::valuacionIsTrabajada($valuacion->id);

        $factura = $valuacion->factura;
        

        if ($valuacionIsTrabajada > 0) {
            $i=1;
        }else{
            $i = 0;
        }

        if ($factura != null) {
            $i = 2;

            $pagos = $factura->pagos;
            $montoPagado = 0;
            foreach ($pagos as $key) {
                $montoPagado = $montoPagado + $key->monto_Pago;
            }

            $retenciones = $factura->retenciones;
            $montoFacturado = $factura->monto_Total;
            $montoRetenciones = 0;
            foreach ($retenciones as $key) {
                $montoRetenciones = $montoRetenciones + $key->monto_Retenido;
            }
            $montoFactura = $montoFacturado - $montoRetenciones;
           // return $montoPagado.' - '.$montoFactura;

            if ($montoPagado > 0) {
                $i = 3;

                if ($montoPagado == $montoFactura) {
                    $i = 4;
                }
            }
        }

         return $i;    
    }

    /*
     * Devuelve 0 si la valuacion no ha sido enviada a pagar, mayor que 0 en caso contrario
     */ 
    public static function valuacionIsFirmada($valuacion)
    {
        $valuacion = Valuaciones::find($valuacion);

        $factura = $valuacion->factura;
        $i=0;

        if ($factura != null) {
            $i++;
        }

         return $i;    
    }

	/*
	 * Devuelve 0 si la valuacion no ha sido trabajada, mayor que 0 en caso contrario
	 */ 
	public static function valuacionIsTrabajada($valuacion)
	{
		 $valuacion = Valuaciones::find($valuacion);

        $i=0;

        $detallesValuacion = $valuacion->detallesValuacion;
        $descuentos = $valuacion->descuentos;
        $adelantos = $valuacion->anticipos;

        foreach ($detallesValuacion as $key) {
            $i++;
        }
        foreach ($descuentos as $key) {
            $i++;
        }
        foreach ($adelantos as $key) {
            $i++;
        }

         return $i;    
	}	

    /*
     * Devuelve 0 si no se ha creado anticipo o adelanto en la valuacion,   
     * mayor que 0 en caso contrario
     */ 
    public static function anticipoIsTrabajado($valuacion)
    {
         $valuacion = Valuaciones::find($valuacion);

        $adelantos = $valuacion->anticipos;
        $i=0;

        foreach ($adelantos as $key) {
            $i++;
        }

         return $i;    
    }

    /*
     * Devuelve 0 si no se ha creado descuentos en la valuacion,   
     * mayor que 0 en caso contrario
     */
    public static function descuentoIsTrabajado($valuacion)
    {
         $valuacion = Valuaciones::find($valuacion);

        $descuentos = $valuacion->descuentos;
        $i=0;

        foreach ($descuentos as $key) {
            $i++;
        }

         return $i;    
    }

    /*
     * Devuelve 0 si no se ha creado detallesValuacion en la valuacion,   
     * mayor que 0 en caso contrario
     */
    public static function detalleIsTrabajado($valuacion)
    {
         $valuacion = Valuaciones::find($valuacion);

        $detallesValuacion = $valuacion->detallesValuacion;
        $i=0;

        foreach ($detallesValuacion as $key) {
            $i++;
        }

         return $i;    
    }

	/*
	 * Devuelve una valuacion filtrando por contrato y nro de Boletin
	 */ 
	public static function valuacionPorBoletin($contrato, $nroBoletin)
	{
		 $data = DB::table('Valuacion')
             ->select('*')
             ->where([
                        'contrato_id' => $contrato,
                        'nro_Boletin' =>  $nroBoletin
                    ])
             ->whereNull('deleted_at')
             ->get();

         $response = Valuaciones::find($data[0]->id);    
         return $response;    
	}

	/*
	 * Devuelve el numero del ultimo boletín emitido
	 */ 
	public static function nroUltimoBoletin($contrato)
	{
		 $data = DB::table('Valuacion')
             ->select('nro_Boletin')
             ->where('contrato_id', $contrato)
             ->whereNull('deleted_at')
             ->orderBy('nro_Boletin', 'desc')
             ->take(1)
             ->get();

         return $data;    
	}	

	/*
	 * Devuelve el numero del ultimo boletín emitido
	 */ 
	public static function nroUltimaValuacion($contrato)
	{
		 $data = DB::table('Valuacion')
             ->select('nro_Valuacion')
             ->where('contrato_id', $contrato)
             ->whereNull('deleted_at')
             ->orderBy('nro_Valuacion', 'desc')
             ->take(1)
             ->get();

         return $data;    
	}


	/*	
	 *	Relaciones con otras Tablas
	 */
	public function user()
    {
        return $this->belongsTo('SAC\User', 'usuario');
    }

    public function contrato()
    {
        return $this->belongsTo('SAC\Contratos', 'contrato_id');
    }

    public function detallesValuacion()
    {
        return $this->hasMany('SAC\DetalleValuacion', 'valuacion_id');
    }

    public function descuentos()
    {
        return $this->hasMany('SAC\Descuentos', 'valuacion_id');
    }

    public function anticipos()
    {
        return $this->hasMany('SAC\Anticipos', 'valuacion_id');
    }

    public function factura()
    {
        return $this->hasOne('SAC\Facturas', 'valuacion_id');
    }
}

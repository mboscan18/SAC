<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;	
use SAC\Valuaciones;
use SAC\Anticipos;
use DB;

class Descuentos extends Model
{
    use SoftDeletes;
    
    protected $table="Deducciones"; 

	protected $fillable = 	[
								'porcentaje_Deduccion',	// Es el porcentaje del anticipo o de la valuacion que se va a descontar.
								'monto_Deduccion', 		// Es el monto que se va a descontar en la valuacion.
								'tipo_Deduccion',		/* Indica el tipo de deduccion que se realiza. Puede ser un descuento 
															regular o puede ser amortización sobre el monto valuado. */
								'usuario', 				// Es el usuario que agrega la entrada en la tabla.
								'valuacion_id', 		// Es el nro de valuacion en la que va a realizar la deduccion.
							];

	protected $dates = ['deleted_at'];	


	/*  
     *  Consultas Estáticas
     * ---------------------
     */

	public static function descuento($valuacion)
    {
         $data = DB::table('Deducciones')
             ->select('*')
             ->where('valuacion_id', $valuacion)
             ->where('deleted_at', null)
             ->get();

         return $data;    
    }

    /*
     * 	Devuelve el monto total descontado sobre Anticipos (1) o sobre Adelantos de factura (2) en una valuacion
     */
    public static function totalDescuentosValuacion($idValuacion, $tipoDeduccion)
    {
    	$totalDescuento = 0;
    	$descuentos = Descuentos::descuento($idValuacion);
    	foreach ($descuentos as $descuento) {
    		if ($descuento->tipo_Deduccion == $tipoDeduccion) {
    			$totalDescuento = $totalDescuento + $descuento->monto_Deduccion;
    		}
    	}

        return $totalDescuento;     
    }

    /*
     * 	Devuelve el monto total descontado sobre Anticipos (1) o sobre Adelantos de factura (2)  hasta el boletin de valuacion indicado
     */
    public static function totalDescuentosHastaPeriodo($contrato, $tipoDeduccion, $nroBoletin)
    {
    	$valuaciones = Valuaciones::valuaciones($contrato);
    	$totalDescuento = 0;
        foreach ($valuaciones as $val) {
        	if ($val->nro_Boletin <= $nroBoletin) {
        		$descuentos = Descuentos::descuento($val->id);
	        	foreach ($descuentos as $descuento) {
	        		if ($descuento->tipo_Deduccion == $tipoDeduccion) {
	        			$totalDescuento = $totalDescuento + $descuento->monto_Deduccion;
	        		}
	        	}
        	}
        	
        }

        return $totalDescuento;     
    }

    /*
     * 	Devuelve el monto total descontado sobre Anticipos (1) o sobre Adelantos de factura (2)
     */
    public static function totalDescuentos($contrato, $tipoDeduccion)
    {
    	$valuaciones = Valuaciones::valuaciones($contrato);
    	$totalDescuento = 0;
        foreach ($valuaciones as $val) {
        	$descuentos = Descuentos::descuento($val->id);
        	foreach ($descuentos as $descuento) {
        		if ($descuento->tipo_Deduccion == $tipoDeduccion) {
        			$totalDescuento = $totalDescuento + $descuento->monto_Deduccion;
        		}
        	}
        }

        return $totalDescuento;     
    }


	/*  
     *  Relaciones con otras Tablas
     * -----------------------------
     */

	public function user()
    {
        return $this->belongsTo('SAC\User', 'usuario');
    }

    public function valuacion()
    {
        return $this->belongsTo('SAC\Valuaciones', 'valuacion_id');
    }
}

<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;	
use SAC\Valuaciones;
use DB;

class Anticipos extends Model
{
    use SoftDeletes;
    
    protected $table="Anticipos"; 

	protected $fillable = 	[
								'concepto_Anticipo', 	// Concepto de anticipo.
								'porcentaje_Anticipo',	// Es el porcentaje del presupuesto total que representa el anticipo entregado.
								'monto_Anticipo', 		// Es el monto designado para el pago del anticipo.
								'tipo_Anticipo',		/* Es el tipo de anticipo. Puede ser Adelanto de factura o Anticipo. 
															Si es adelanto de factura en la proxima valuacion se debe cobrar un 
															porcentaje del monto del anticipo. Si es anticipo en la proxima valuacion 
															se debe cobrar el porcentaje del Proyecto equivalente al monto del aanticipo. */
								'usuario', 				// Es el usuario que agrega la entrada en la tabla.
								'valuacion_id', 		// Es la valuacion en la que se emite la orden de pago del anticipo.
							];

	protected $dates = ['deleted_at'];	


	/*  
     *  Consultas Estáticas
     * ---------------------
     */

	public static function anticipo($valuacion)
    {
         $data = DB::table('Anticipos')
             ->select('*')
             ->where('valuacion_id', $valuacion)
             ->whereNull('deleted_at')
             ->get();

        $anticipos = array();
        $i = 0;
        foreach ($data as $key) {
            $anticipos[$i] = Anticipos::find($key->id);
            $i++;
        }     

         return $anticipos;    
    }

	public static function nroAnticipo($valuacion)
    {
         $select = DB::table('Anticipos')
			->select(DB::raw('count(*) as orden'))
             ->where('valuacion_id', $valuacion)
             ->whereNull('deleted_at')
             ->get();

        $orden = $select[0]->orden;
        return $orden;     
    }

    /*
     * 	Devuelve el monto total entregado de Anticipo (1) o de Adelanto (2) en la valuacion
     */
    public static function totalAnticipoValuacion($valuacion, $tipoAnticipo)
    {
    	$totalAnticipo = 0;
    	$anticipos = Anticipos::anticipo($valuacion);
    	foreach ($anticipos as $anticipo) {
    		if ($anticipo->tipo_Anticipo == $tipoAnticipo) {
    			$totalAnticipo = $totalAnticipo + $anticipo->monto_Anticipo;
    		}
    	}

        return $totalAnticipo;     
    }

    /*
     * 	Devuelve el monto total entregado de Anticipo (1) o de Adelanto (2) hasta el boletin de valuacion indicado
     */
    public static function totalAnticipoHastaPeriodo($contrato, $tipoAnticipo, $nroBoletin)
    {
    	$valuaciones = Valuaciones::valuaciones($contrato);
    	$totalAnticipo = 0;
        foreach ($valuaciones as $val) {
        	if($val->nro_Boletin <= $nroBoletin){
        		$anticipos = Anticipos::anticipo($val->id);
	        	foreach ($anticipos as $anticipo) {
	        		if ($anticipo->tipo_Anticipo == $tipoAnticipo) {
	        			$totalAnticipo = $totalAnticipo + $anticipo->monto_Anticipo;
	        		}
	        	}
        	}
        	
        }

        return $totalAnticipo;     
    }

    /*
     * 	Devuelve el monto total entregado de Anticipo (1) o de Adelanto (2)
     */
    public static function totalAnticipo($contrato, $tipoAnticipo)
    {
    	$valuaciones = Valuaciones::valuaciones($contrato);
    	$totalAnticipo = 0;
        foreach ($valuaciones as $val) {
        	$anticipos = Anticipos::anticipo($val->id);
        	foreach ($anticipos as $anticipo) {
        		if ($anticipo->tipo_Anticipo == $tipoAnticipo) {
        			$totalAnticipo = $totalAnticipo + $anticipo->monto_Anticipo;
        		}
        	}
        }

        return $totalAnticipo;     
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
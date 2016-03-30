<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;	
use DB;

class RetencionesContrato extends Model
{
    use SoftDeletes;
    
    protected $table="RetencionesContrato"; 

	protected $fillable = 	[
								'retenciones_id',		// Es la retenciona a plicar sobre el contrato.
								'contrato_id',			// Es el contrato sobre el cual se aplica la retencion.
								'sustraendo', 			// Es un monto que se descuenta adicional del porcentaje.
								'porcentaje', 			// Es el porcentaje del monto de la factura que va a ser retenido.
								'usuario', 				// Es el usuario que agrega la entrada en la tabla.
							];

	protected $dates = ['deleted_at'];	

	/*	
	 *	Consultas Estáticas
	 */

	public static function retencionesContrato($contrato)
	{
		 $data = DB::table('RetencionesContrato')
             ->select('*')
             ->where('contrato_id', $contrato)
             ->whereNull('deleted_at')
             ->get();

         $retenciones = array();
         $i = 0;    
         foreach ($data as $key) {
             $retenciones[$i] = RetencionesContrato::find($key->id);
             $i++;
         }    
         return $retenciones;    
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

	public function retencion()
    {
        return $this->belongsTo('SAC\Retenciones', 'retenciones_id');
    }

}

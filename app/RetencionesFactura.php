<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;	
use DB;

class RetencionesFactura extends Model
{
    use SoftDeletes;
    
    protected $table="RetencionesFactura"; 

	protected $fillable = 	[
								'retenciones_id',			// Es el tipo de retencion que se va a aplicar.
								'factura_id',				// Es el tipo de retencion que se va a aplicar.
								'sustraendo', 				// Es un monto que se descuenta adicional del porcentaje.
								'porcentaje_Retencion', 	// Es el porcentaje del monto facturado a retener.
								'monto_Retenido', 			// Es el monto retenido.
								'usuario', 					// Es el usuario que agrega la entrada en la tabla.
							];

	protected $dates = ['deleted_at'];	

	/*	
	 *	Consultas Estáticas
	 */

	


	/*	
	 *	Relaciones con otras Tablas
	 */
	public function user()
    {
        return $this->belongsTo('SAC\User', 'usuario');
    }
    
	public function factura()
    {
        return $this->belongsTo('SAC\Facturas', 'factura_id');
    }

	public function retencion()
    {
        return $this->belongsTo('SAC\Retenciones', 'retenciones_id');
    }
}

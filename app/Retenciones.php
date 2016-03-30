<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;	
use DB;

class Retenciones extends Model
{
    use SoftDeletes;
    
    protected $table="Retenciones"; 

	protected $fillable = 	[
								'descripcion',		// Es la descripcion del tipo de retencion.
								'status',			// Indica si la retencion está activa (1) o inactiva (0)
								'tipo', 			// Indica si la retencion es sobre el monto base de la factura (1) o si es sobre el monto del IVA (2)
								'usuario', 			// Es el usuario que agrega la entrada en la tabla.
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

}

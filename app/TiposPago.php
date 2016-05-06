<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TiposPago extends Model
{
    use SoftDeletes;

    protected $table="TiposPago"; 

	protected $fillable = 	[
								'descripcion',		// Es La descripcion del Tipo de Pago
								'usuario', 			// Es el usuario que agrega la entrada en la tabla.
							];

	protected $dates = ['deleted_at'];	

	/*	
	 *	Relaciones con otras Tablas
	 */
	public function user()
    {
        return $this->belongsTo('SAC\User', 'usuario');
    }

    public function pagos()
    {
        return $this->hasMany('SAC\Pagos', 'tiposPago_id');
    }

}

	

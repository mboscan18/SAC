<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TiposCuenta extends Model
{
    use SoftDeletes;

    protected $table="TiposCuenta"; 

	protected $fillable = 	[
								'descripcion',		// Es La descripcion del Tipo de Cuenta
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

    public function DatosBancarios()
    {
        return $this->hasMany('SAC\DatosBancarios', 'tipoCuenta_id');
    }
}


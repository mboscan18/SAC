<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Capitulos extends Model
{
	use SoftDeletes;

    protected $table="Capitulo"; 

	protected $fillable = 	[
								'Descripcion', 			// Es la descripcion del Capitulo.
								'usuario',				// Es el usuario que agrega la entrada en la tabla.
							];

	protected $dates = ['deleted_at'];	

	public function proyectos()
    {
        return $this->hasOne('SAC\Proyectos', 'cc_id');
    }	

    public function detalle_valuacion()
    {
        return $this->hasMany('SAC\DetalleValuacion', 'cc_id');
    }					

	public function user()
    {
        return $this->belongsTo('SAC\User', 'usuario');
    }
}

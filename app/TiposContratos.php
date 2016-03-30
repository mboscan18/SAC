<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TiposContratos extends Model
{
    use SoftDeletes;
    
    protected $table="Tipos_Contratos"; 

	protected $fillable = 	[
								'descripcion', 			// Es la descripción del tipo de contrato.
								'usuario',				// Es el usuario que agrega la entrada en la tabla.
							];

	protected $dates = ['deleted_at'];
}

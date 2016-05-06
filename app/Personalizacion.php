<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;

class Personalizacion extends Model
{
    protected $table="Personalizacion"; 

    public $timestamps = false;

	protected $fillable = 	[
								'usuario_id', 	// Es el usuario que tiene la preferencia
								'empresa_id',	// Es la empresa preferida del usuario
							];
}

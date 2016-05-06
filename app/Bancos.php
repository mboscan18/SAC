<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Bancos extends Model
{
    use SoftDeletes;

    protected $table="Bancos"; 

	protected $fillable = 	[
								'nombreBanco',		// Es el nombre del banco
								'logo',				// Es el logo del banco
								'usuario', 			// Es el usuario que agrega la entrada en la tabla.
							];

	protected $dates = ['deleted_at'];	

	public function setLogoAttribute($logo){
    	if(! empty($logo)){
			$name = 'Banco-'
					.Carbon::now()->timestamp.'-'
					.Carbon::now()->second.'-'
					.$logo->getClientOriginalName();
			$this->attributes['logo'] = $name;
			\Storage::disk('local')->put($name, \File::get($logo));
    	}
	}
	
	/*	
	 *	Relaciones con otras Tablas
	 */
	public function user()
    {
        return $this->belongsTo('SAC\User', 'usuario');
    }

    public function DatosBancarios()
    {
        return $this->hasMany('SAC\DatosBancarios', 'banco_id');
    }
}



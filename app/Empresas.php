<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;


class Empresas extends Model
{
	use SoftDeletes;

    protected $table="Empresas";
    
	
	protected $fillable = 	[
								'codIdentificacion_Empresa', 	// Es el codigo de identificacion de la empresa (RIF).
								'nombre_Empresa', 				// Es el nombre de la empresa.
								'telefono', 					// Es el nro telefonico de la Empresa.
								'direccion',					// Es la direccion de la Empresa.
								'logo',							// Es el logo de la empresa.
								'nombreContacto',				// Es el nombre de contacto del repreentante de la empresa.
								'usuario',
							];

	
    protected $dates = ['deleted_at'];	

    public function setLogoAttribute($logo){
    	if(! empty($logo)){
			$name = 'Empresa-'
					.Carbon::now()->timestamp.'-'
					.Carbon::now()->second.'-'
					.$logo->getClientOriginalName();
			$this->attributes['logo'] = $name;
			\Storage::disk('local')->put($name, \File::get($logo));
    	}
	}	

	public function datosBancarios()
    {
        return $this->hasMany('SAC\DatosBancarios', 'empresa_id');
    }

    public function proyectos()
    {
        return $this->hasMany('SAC\Proyectos', 'empresa_id');
    }
					
	public function user()
    {
        return $this->belongsTo('SAC\User', 'usuario');
    }
	
}

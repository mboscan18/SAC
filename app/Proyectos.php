<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Proyectos extends Model
{
    use SoftDeletes;

    protected $table="Proyectos"; 

	protected $fillable = 	[
								'cod_Proyecto',			// Es el codigo del proyecto, es un codigo unico.
								'nombre_Proyecto', 		// Es el nombre descriptivo del proyecto.
								'ubicacion_Proyecto', 	// Es la direccion en donde se lleva a cabo el proyecto.
								'latitud', 				// Es la latitud en el mapa donde esta ubicado el proyecto.
								'longitud',				// Es la longitud en el mapa donde esta ubicado el proyecto.
								'empresa_id',			// Es la empresa cliente del proyecto.
								'estado_Proyecto',		// Es el estado del proyecto. (Activo, Inactivo)
								'usuario', 	
							];

	protected $dates = ['deleted_at'];		

	/*  
     *  Consultas Estáticas
     * ---------------------
     */

	public static function proyectoPorCodigo($codProyecto)
    {
         $data = DB::table('Proyectos')
             ->select('*')
             ->where('cod_Proyecto', $codProyecto)
             ->whereNull('deleted_at')
             ->get();

         return $data;    
    }

	/*  
     *  Relaciones con otras Tablas
     * -----------------------------
     */					

	public function user()
    {
        return $this->belongsTo('SAC\User', 'usuario');
    }

    public function empresa()
    {
        return $this->belongsTo('SAC\Empresas', 'empresa_id');
    }

    public function contratos()
    {
        return $this->hasMany('SAC\Contratos', 'cod_Proyecto');
    }

}

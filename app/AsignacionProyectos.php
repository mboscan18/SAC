<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class AsignacionProyectos extends Model
{
    use SoftDeletes;

    protected $table="AsignacionProyectos"; 

	protected $fillable = 	[
								'usuario_id', 			// Es el usuario que va a administrar el proyecto.
								'proyecto_id',			// Es el proyecto a ser Administrado

								'usuario',
							];

	protected $dates = ['deleted_at'];	

	/*  
     *  Consultas Estáticas
     * ---------------------
     */

	public static function asignaciones($user)
    {
         $data = DB::table('AsignacionProyectos')
             ->select('*')
             ->where('usuario_id', $user)
             ->whereNull('deleted_at')
             ->get();

         $response = array();  
         $i = 0;  
         foreach ($data as $key) {
             	$temp = AsignacionProyectos::find($key->id);
                    $response[$i] = $temp;
                    $i++;
             }    

         return $response;    
    }

	/*  
     *  Relaciones con otras Tablas
     * -----------------------------
     */

	public function user()
    {
        return $this->belongsTo('SAC\User', 'usuario');
    }				

	public function proyecto()
    {
        return $this->belongsTo('SAC\Proyectos', 'proyecto_id');
    }					

	public function administrador()
    {
        return $this->belongsTo('SAC\User', 'usuario_id');
    }
}

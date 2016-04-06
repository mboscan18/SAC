<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;	
use SAC\Contratos;
use DB;


class Firmantes extends Model
{
    use SoftDeletes;
    
    protected $table="Firmantes"; 

	protected $fillable = 	[
								'nombre',		// Es el nombre de la persona que firma las operaciones sobre el contrato.
								'apellido', 	// Es el apellido de la persona que firma las operaciones sobre el contrato.
								'cargo', 		// Es el Cargo de la persona que firma las operaciones sobre el contrato.
								'usuario', 		// Es el usuario que agrega la entrada en la tabla.
							];

	protected $dates = ['deleted_at'];	

	 /*  
     *  Consultas Estáticas
     * ---------------------
     */

    public static function allFirmantes()
    {
        $data = DB::table('Firmantes')
             ->select('*')
             ->orderBy('nombre','asc')
             ->whereNull('deleted_at')
             ->get();

         return $data;
    } 

    public static function nroFirmantesContrato($idContrato)
    {
    	$contrato = Contratos::find($idContrato);
    	$firmantes = $contrato->firmantes_OS;

    	$i = 0;
    	$j = 0;
    	foreach ($firmantes as $key) {
    		if ($key->empresa == 1) {
    			$i++;
    		}else{
    			$j++;
    		}
    	}
         
        $response = array();
        $response[0] = $i;
        $response[1] = $j;

        return $response;    
    }

     public static function nroFirmantesValuacion($idContrato)
    {
    	$contrato = Contratos::find($idContrato);
    	$firmantes = $contrato->firmantes_VAL;

    	$i = 0;
    	$j = 0;
    	foreach ($firmantes as $key) {
    		if ($key->empresa == 1) {
    			$i++;
    		}else{
    			$j++;
    		}
    	}
         
        $response = array();
        $response[0] = $i;
        $response[1] = $j;

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
}

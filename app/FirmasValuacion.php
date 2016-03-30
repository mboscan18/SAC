<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use SAC\Firmantes;
use DB;

class FirmasValuacion extends Model
{
    
    protected $table="Firmas_Valuacion"; 

    public $timestamps = false;

	protected $fillable = 	[
								'accion', 			// Indica la accion que tiene el firmante sobre la valuacion. Por ejemplo: Revisado, Aprobado, Emitido, etc.
								'empresa', 			// Indica si el firmante firm por parte de la empresa cliente (1) o si firma por la empresa contratista (2)
								'firmantes_id',		// Es la persona que va a firmar por las valuaciones en el contrato.
								'contrato_id', 		// Es el contrato en el que el firmante ejecuta su firma.
							];

	/*  
     *  Consultas Estáticas
     * ---------------------
     */

    public static function firmasValuacion($contrato)
    {
         $data = DB::table('Firmas_Valuacion')
             ->select('*')
             ->where('contrato_id', $contrato)
             ->get();

    	 $response = array();  
         $i = 0;  
         foreach ($data as $key) {
             	$response[$i] = FirmasValuacion::find($key->id);
             	$i++;
             }    

         return $response;   
    }

	/*  
     *  Relaciones con otras Tablas
     * -----------------------------
     */

    public function contrato()
    {
        return $this->belongsTo('SAC\Contratos', 'contrato_id');
    }

    public function firmante()
    {
        return $this->belongsTo('SAC\Firmantes', 'firmantes_id');
    }							

}

<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use SAC\Presupuestos;
use DB;

class VariacionPresupuesto extends Model
{
    use SoftDeletes;

    protected $table="Variaciones_Presupuesto"; 

	protected $fillable = 	[
								'partida_id',		// Es el numero de la partida que va a variar.
								'descripcion', 		// Es la descripcion de la partida.
								'unidad',			// Es la unidad en la que se cuantifican las cantidades de la partida.
								'cantidad',			// Es la cantidad total para completar la partida.
								'monto_Total',		// Es el costo total de la partida.
								'orden_adendum', 	// Indica el numero de adendum en el que se crea la variacion.
								'orden_Variacion',	// Indica si la partida ha sido modificada. (0 = no hubo cambios. 1 = si hubo cambios)
								'usuario', 	
								
							];

	protected $dates = ['deleted_at'];		

	/*	
	 *	Consultas Estáticas
	 */

	public static function partidasFirmadas($id_contrato, $nroAdendum)
	{
		$contrato = Contratos::find($id_contrato);
		$partidas = Presupuestos::partidas($id_contrato);

		$partidasFirmadas = array();
		$i=0;
		foreach ($partidas as $key) {
			 $data = DB::table('Variaciones_Presupuesto')
	             ->select('*')
	             ->where([
	                        'partida_id' => $key->id,
	                        'orden_adendum' =>  $nroAdendum
	                    ])
	             ->whereNull('deleted_at')
	             ->get();
	        if ($data != null) {
	        	$temp = VariacionPresupuesto::find($data[0]->id);  
	        	$partidasFirmadas[$i] = $temp;
	        	$i++;
         	}     
	           
		}
         return $partidasFirmadas;    
	}

	public static function lastPartidaFirmada($partida)
	{

		 $data = DB::table('Variaciones_Presupuesto')
             ->select('*')
             ->where('partida_id', $partida)
             ->orderBy('orden_adendum', 'desc')
             ->whereNull('deleted_at')
             ->take(1)
             ->get();

         $response = VariacionPresupuesto::find($data[0]->id);    

         return $response;    
	}

	public static function partidaAdendum($partida, $nroAdendum)
	{

		$data = DB::table('Variaciones_Presupuesto')
             ->select('*')
             ->where([
                        'partida_id' => $partida,
                        'orden_adendum' =>  $nroAdendum
                    ])
             ->whereNull('deleted_at')
             ->get();

         if ($data != null) {
			$response = VariacionPresupuesto::find($data[0]->id);    
         }else{
         	return null;
         }

         return $response;    
	}  

	public static function partidaIsFirmada($partida)
	{
		$select = DB::table('Variaciones_Presupuesto')
			->select(DB::raw('count(*) as cant'))
             ->where('partida_id', $partida)
             ->whereNull('deleted_at')
             ->get();

        $cant = $select[0]->cant;
        return $cant;     
	}	

	public static function lastPartidasFirmadas($contrato)
	{
		$partidas = Presupuestos::partidas($contrato);

		$response = array();
		$i = 0;
		foreach ($partidas as $key) {
			$cantidad = VariacionPresupuesto::partidaIsFirmada($key->id);
			if ($cantidad > 0) {
				$response[$i] = VariacionPresupuesto::lastPartidaFirmada($key->id);
				$i++;
			}
		}


         return $response;    
	} 	

	public static function ordenVariacion($partida)
	{
		$select = DB::table('Variaciones_Presupuesto')
			->select(DB::raw('count(*) as orden'))
             ->where('partida_id', $partida)
             ->whereNull('deleted_at')
             ->get();

        $orden = $select[0]->orden - 1;
        return $orden;     
	}			

    public static function valorContratoAdendum($contrato, $nroAdendum)
    {
    	$partidas = Presupuestos::partidas($contrato);

		$partidasAdendum = array();
		$i = 0;
		foreach ($partidas as $key) {
			$cantidad = VariacionPresupuesto::partidaIsFirmada($key->id);
			if ($cantidad > 0) {
				$partidasAdendum[$i] = VariacionPresupuesto::partidaAdendum($key->id, $nroAdendum);
				$i++;
			}
		}
		//return $partidasAdendum;
          $valorContrato = 0;   
          foreach ($partidasAdendum as $key) {
          		if ($key != null) {
                	$valorContrato  = $valorContrato + $key->monto_Total;
          		}
             }   
         return $valorContrato;    
    }  		


	/*	
	 *	Relaciones con otras Tablas
	 */
	public function user()
    {
        return $this->belongsTo('SAC\User', 'usuario');
    }

    public function partida()
    {
        return $this->belongsTo('SAC\Presupuestos', 'partida_id');
    }
    
}

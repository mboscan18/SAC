<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class OrdenServicio extends Model
{
    use SoftDeletes;

    protected $table="OrdenServicio"; 

	protected $fillable = 	[
								'contrato_id',		// Es el contrato sobre el cual se está firmando.
								'fecha_inicio', 	// Es la fecha en la que inicia el contrato.
								'fecha_fin', 		// Es la fecha en la que culmina el contrato.
								'fecha_firma',	    // Es la fecha en la que se lleva a cabo la firma de la orden de servicio.
                                'descripcion',      // Es la Descripcion del contrato.
								'observaciones',	// Son observaciones o notas importantes referentes al contrato.
								'orden_adendum',	/* Indica el numero de veces que se ha modificado el contrato. Si es la 
														primera vez que se modifica el orden de adendum es 1. */
								'usuario', 	
							];

	protected $dates = ['deleted_at'];		

	/*	
	 *	Consultas Estáticas
	 */

	public static function partidas($contrato)
	{
		 $partidas = DB::table('Presupuesto')
             ->select('*')
             ->where('contrato_id', $contrato)
             ->whereNull('deleted_at')
             ->get();

         return $partidas;    
	}

	public static function ordenServicio($contrato, $nroAdendum)
	{
		 $data = DB::table('OrdenServicio')
             ->select('*')
             ->where([
                        'contrato_id' => $contrato,
                        'orden_adendum' =>  $nroAdendum
                    ])
             ->whereNull('deleted_at')
             ->get();
         if ($data != null) {
         	$ordenServ = OrdenServicio::find($data[0]->id);   
         }else{
         	return null;
         }

         return $ordenServ;    
	} 	

	public static function ordenAdendum($contrato)
	{
		$select = DB::table('OrdenServicio')
			->select(DB::raw('count(*) as orden'))
             ->where('contrato_id', $contrato)
             ->whereNull('deleted_at')
             ->get();

        $orden = $select[0]->orden - 1;
        return $orden;     
	}			


	/*	
	 *	Relaciones con otras Tablas
	 */
	public function user()
    {
        return $this->belongsTo('SAC\User', 'usuario');
    }

    public function contrato()
    {
        return $this->belongsTo('SAC\Contratos', 'contrato_id');
    }
    
}

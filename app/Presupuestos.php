<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use SAC\DetalleValuacion;
use SAC\Anticipos;
use SAC\Descuentos;
use DB;

class Presupuestos extends Model
{
   	use SoftDeletes;

    protected $table="Presupuesto"; 

	protected $fillable = 	[
								'nro_Partida',		// Es el nro de Partida.
								'contrato_id', 		// Es el nro de contrato al que pertenece el presupuesto.	
								'descripcion', 		// Es la descripcion de la partida.
								'unidad',			// Es la unidad en la que se cuantifican las cantidades de la partida.
								'cantidad',			// Es la cantidad total para completar la partida.
								'monto_Total',		// Es el costo total de la partida.
								'orden_Partida', 	/* Indica el orden de la partida. Cuando la partida tiene orden 0 significa 
													   que es una partida que forma parte del presupuesto inicial. Cuando tiene 
													   mas de 0 significa que son partidas agregadas sobre el presupuesto inicial.  */
								'orden_Variacion',	// Indica si la partida ha sido modificada. (0 = no hubo cambios. 1 = si hubo cambios)
								'capitulo_id',		// Es elcapítulo al que pertnec la partida
								'usuario', 	
								'precio_Unitario',	// Es el costo que tiene cada unidad de la partida.
							];

	protected $dates = ['deleted_at'];		

	/*	
	 *	Consultas Estáticas
	 */

	public static function partidas($contrato)
	{
		 $data = DB::table('Presupuesto')
             ->select('*')
             ->where('contrato_id', $contrato)
             ->whereNull('deleted_at')
             ->get();

         $partidas = array();
         $i = 0;    
         foreach ($data as $key) {
             $partidas[$i] = Presupuestos::find($key->id);
             $i++;
         }    
         return $partidas;    
	} 	

	public static function partida($idPartida)
	{
		 $partida = DB::table('Presupuesto')
             ->select('*')
             ->where('id', $idPartida)
             ->whereNull('deleted_at')
             ->get();

         return $partida;    
	}	

    public static function valorContrato($contrato)
    {
         $partidas = DB::table('Presupuesto')
             ->select('*')
             ->where('contrato_id', $contrato)
             ->orderBy('nro_Partida')
             ->whereNull('deleted_at')
             ->get();

          $valorContrato = 0;   
          foreach ($partidas as $key) {
                $valorContrato  = $valorContrato + $key->monto_Total;
             }   
         return $valorContrato;    
    }       

			


    /*
     * Devuelve el monto total faltantes sobre el contrato
     */
    public static function montoFaltanteContrato($contrato)
    {
         
        $partidas = Presupuestos::partidas($contrato);

        $montoFaltante = 0;     
        foreach ($partidas as $key) {
                 $montoFaltante = $montoFaltante + DetalleValuacion::montoFaltantePartida($key->id);
             }     

         return $montoFaltante;    
    }

    /*
     * Devuelve el monto total faltantes sobre el contrato
     */
    public static function montoEjecutadoContrato($contrato)
    {
         
        $partidas = Presupuestos::partidas($contrato);

        $montoEjecutado = 0;     
        foreach ($partidas as $key) {
    		$montoEjecutado = $montoEjecutado + DetalleValuacion::montoTrabajadaPartidaTotal($key->id);
        }     

         return $montoEjecutado;    
    }

    /*
     * Devuelve el avance financiero del contrato
     */
    public static function avanceFinanciero($contrato)
    {
         
        $montoEjecutado = Presupuestos::montoEjecutadoContrato($contrato);
        $valorContrato = Presupuestos::valorContrato($contrato);
        $montoAnticipos = Anticipos::totalAnticipo($contrato,1);
        $montoAdelantos = Anticipos::totalAnticipo($contrato,2);
        $descuentosAnticipos = Descuentos::totalDescuentos($contrato,1);
        $descuentosAdelantos = Descuentos::totalDescuentos($contrato,2);

        $SaldoContrato = ($montoEjecutado + $montoAnticipos + $montoAdelantos) - $descuentosAnticipos - $descuentosAdelantos;

        $avanceFinanciero = ($SaldoContrato * 100) / $valorContrato;

         return $avanceFinanciero;    
    }

    /*
     * Devuelve el avance fisico del contrato
     */
    public static function avanceFisico($contrato)
    {
         
        $montoEjecutado = Presupuestos::montoEjecutadoContrato($contrato);
        $valorContrato = Presupuestos::valorContrato($contrato);

        $avanceFisico = ($montoEjecutado * 100) / $valorContrato;

         return $avanceFisico;    
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
    
    public function capitulo()
    {
        return $this->belongsTo('SAC\Capitulos', 'capitulo_id');
    }
}

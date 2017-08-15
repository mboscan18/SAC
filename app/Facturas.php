<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;	
use DB;

class Facturas extends Model
{
    
    protected $table="Recibo_Factura"; 

	protected $fillable = 	[
								'fecha_Emision',	// Es la fecha en que se emite la factura.
								'tipo_Factura',		// Es el tipo de entregble que se esta recibiendo, puede ser Recibo = R, o Factura = F
								'monto_Total', 		// Es el monto neto + el monto del IVA.
								'monto_Neto', 		// Es el monto neto de la factura (Sin IVA).
								'monto_IVA', 		// Es el monto que representa el IVA.
								'valuacion_id',		// Es la valuacion que se va a facturar.
								'usuario', 			// Es el usuario que agrega la entrada en la tabla.
							];


    /*  
     *  Consultas Estáticas
     * ---------------------
     */

    public static function facturaPorValuacion($valuacion)
    {
         $data = DB::table('Recibo_Factura')
             ->select('*')
             ->where('valuacion_id', $valuacion)
             ->get();

             $response = Facturas::find($data[0]->id);
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

    public function valuacion()
    {
        return $this->belongsTo('SAC\Valuaciones', 'valuacion_id');
    }

    public function pagos()
    {
        return $this->hasMany('SAC\Pagos', 'factura_id');
    }

    public function retenciones()
    {
        return $this->hasMany('SAC\RetencionesFactura', 'factura_id');
    }
}

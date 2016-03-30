<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Pagos extends Model
{
    use SoftDeletes;

    protected $table="Pagos"; 

	protected $fillable = 	[
								'nroComprobante',		// Es el nro de comprobante de deposito o transferencia.
								'fechaEmision', 		// Es la fecha en la que se realizo el pago.
								'monto_Pago',			// Es el monto que se pago.
								'factura_id',			// Es el nro de factura sobre la cual se realiza el pago.
								'tiposPago_id',			// Indica el tipo de Pago que se lleva a cabo
								'datosBancarios_id', 	//Son los datos bancarios de la empresa a la cual se le va a hacer el pago.
								'usuario', 				// Es el usuario que agrega la entrada en la tabla.
							];

	protected $dates = ['deleted_at'];		

	/*	
	 *	Consultas Estáticas
	 */

	public static function pagos($contrato)
	{
		 $data = DB::table('Pagos')
             ->select('*')
             ->where('contrato_id', $contrato)
             ->get();

         $pagos = array();
         $i = 0;    
         foreach ($data as $key) {
             $pagos[$i] = Pagos::find($key->id);
             $i++;
         }    
         return $pagos;    
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
    
    public function tipoPago()
    {
        return $this->belongsTo('SAC\TiposPago', 'tiposPago_id');
    }

    public function datosBancarios()
    {
        return $this->belongsTo('SAC\DatosBancarios', 'datosBancarios_id');
    }
}

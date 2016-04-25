<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use SAC\Contratos;
use DB;

class Pagos extends Model
{
    use SoftDeletes;

    protected $table="Pagos"; 

	protected $fillable = 	[
								'nroComprobante',		// Es el nro de comprobante de deposito o transferencia.
								'fechaEmision', 		// Es la fecha en la que se realizo el pago.
								'monto_Pago',			// Es el monto que se pago.
								'comprobante',          // Es el comprobante de que se realizó el pago
                                'factura_id',           // Es el nro de factura sobre la cual se realiza el pago.
                                'tiposPago_id',         // Indica el tipo de Pago que se lleva a cabo
                                'datosBancarios_id',    //Son los datos bancarios de la empresa a la cual se le va a hacer el pago.
								'usuario', 				// Es el usuario que agrega la entrada en la tabla.
							];

	protected $dates = ['deleted_at'];		

	/*	
	 *	Consultas Estáticas
	 */

	public static function pagosContrato($contrato_id)
	{
        $contrato = Contratos::find($contrato_id);
        $valuaciones = $contrato->valuaciones;

        $facturas = array();
        $i = 0;
        foreach ($valuaciones as $key) {
            $facturas[$i] = $key->factura;
            $i++;
        }

        $acumuladoPagos = 0;
        foreach ($facturas as $key) {
            $pagos = $key->pagos;
            foreach ($pagos as $pago) {
                $acumuladoPagos = $acumuladoPagos + $pago->monto_Pago;
            }
        }
        return $acumuladoPagos;  
	} 	



	/*	
	 *	Relaciones con otras Tablas
	 */
	public function user()
    {
        return $this->belongsTo('SAC\User', 'usuario');
    }

    public function factura()
    {
        return $this->belongsTo('SAC\Facturas', 'factura_id');
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

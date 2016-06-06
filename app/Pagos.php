<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use SAC\Contratos;
use SAC\Presupuestos;
use SAC\Valuaciones;
use SAC\RetencionesContrato;
use DB;
use Carbon\Carbon;

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


    public function setComprobanteAttribute($comprobante){
        if(! empty($comprobante)){
            $name = '\'PAGO-'
                    .$this->attributes['nroComprobante'].'-'
                    .Carbon::now()->timestamp.'-'
                    .Carbon::now()->second.'-'
                    .$comprobante->getClientOriginalName().'\'';
            $this->attributes['comprobante'] = $name;
            \Storage::disk('local')->put($name, \File::get($comprobante));
        }
    }	

	/*	
	 *	Consultas Estáticas
	 */
  

    /*
     *  Devuelve el monto total pagado en un contrato
     */
    public static function estadoPagosContrato($contrato_id)
    {
        $contrato = Contratos::find($contrato_id);
        $valuaciones = $contrato->valuaciones;

        $resumenValuaciones = array();
        $i = 0;
        foreach ($valuaciones as $key) {
            if ($key->lista == 'S') {
                $resumenValuaciones[$i] = Valuaciones::resumenValuacion($key->id);
                $i++;
            }
        }

        $enviadoPagar = 0;
        $totalPagado = 0;
        $diferencia = 0;
        foreach ($resumenValuaciones as $key) {
            $enviadoPagar = $enviadoPagar + $key->neto_Pagar;
            $totalPagado = $totalPagado + $key->monto_pagado;
            $diferencia = $diferencia + $key->diferencia_pago;
        }

        $response = array();
        $response[0] = $enviadoPagar;
        $response[1] = $totalPagado;
        $response[2] = $diferencia;


        return $response;

    }   

    /*
     *  Devuelve el monto total a pagar de un contrato
     */
	public static function montoPagarContrato($contrato_id)
	{
        $contrato = Contratos::find($contrato_id);
        $valuaciones = $contrato->valuaciones;
        $IVA = $contrato->IVA;

        $valorContrato = Presupuestos::valorContrato($contrato_id);
        $valorContrato_IVA = ($valorContrato * $IVA)/100;
        $valorContrato_Total = $valorContrato + $valorContrato_IVA;
        
        $retencionesContrato = RetencionesContrato::retencionesContrato($contrato_id);

        $Total_Retener = 0;

        foreach ($retencionesContrato as $key) {
            if ($key->retencion->tipo == 1) {
                $montoRetencion = ($valorContrato * $key->porcentaje) / 100;
            }elseif ($key->retencion->tipo == 2) {
                $montoRetencion = ($valorContrato_IVA * $key->porcentaje) / 100;
            }

            $sustraendo = 0;
            foreach ($valuaciones as $val) {
                if ($val->nro_Valuacion != null) {
                    $sustraendo = $sustraendo + $key->sustraendo;
                }
            }
          //echo 'Sus '.$sustraendo;

            $montoRetenido = $montoRetencion - $sustraendo;

            $Total_Retener = $Total_Retener + $montoRetenido;
        }

        $total_Pagar = $valorContrato_Total - $Total_Retener;

        return $total_Pagar;
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

<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use SAC\Pagos;
use SAC\Presupuestos;
use DB;

class Contratos extends Model
{
    use SoftDeletes;

    protected $table="Contratos"; 

	protected $fillable = 	[
								'nro_Contrato',				// Es el nro de contrato.
								'fecha_inicio', 			// Es la fecha en la que inicia el contrato.
								'fecha_fin', 				// Es la fecha en la que culmina el contrato.
								'fecha_firma',	            // Es la fecha en la que se entrega el presupuesto base.
                                'descripcion',              // Es la Descripcion del contrato.
								'observaciones',			// Son observaciones o notas importantes referentes al contrato.
								'estado_Contrato',			// Es el estado del contrato en el proyecto. ( Activo, Inactivo)
								'cod_Proyecto',				// Es el proyecto al cual pertenece el contrato.
								'empresa_Proveedor',		// Es la empresa proveedora del servicio en el proyecto.
                                'orden_adendum',            // Es el numero de modificaciones que se han realizado sobre el contrato.
                                'moneda_contrato',          // Es la moneda en la cual se manejarán los pagos del contrato.
                                'tipo_contratos_id',        // Es el tipo de contrato.
                                'porcentajeAnticipo',       /* Indica el porcentaje que se deberá descontar en cada valuación, 
                                                                referente a un anticipo entregado al iniciar el contrato.  */
                                'usuario',  
                                'IVA',                      // Es el impuesto que se debe cargar sobre cada valuacion.
                                'forma_pago',               // Indica la forma de pago que se llevará a cabo en el contrato.
								'nroFacturas', 	            // Es un numero estimado de cuantas facturaciones va a tener el contrato.
							];

	protected $dates = ['deleted_at'];							

    /*  
     *  Consultas Estáticas
     */        

    public static function contratosPorProyecto($proyecto)
    {
         $partidas = DB::table('Contratos')
             ->select('*')
             ->where('cod_Proyecto', $proyecto)
             ->whereNull('deleted_at')
             ->get();

         return $partidas;    
    } 

    public static function contratoPorNroContrato($nroContrato)
    {
         $contrato = DB::table('Contratos')
             ->select('*')
             ->where('nro_Contrato', $nroContrato)
             ->whereNull('deleted_at')
             ->get();

         return $contrato;    
    }    

    /*
     * Devuelve 0 si no se han creado paratidas en el contrato,   
     * mayor que 0 en caso contrario
     */ 
    public static function partidasIscreada($id_contrato)
    {
         $contrato = Contratos::find($id_contrato);

        $partidas = $contrato->presupuestos;
        $i=0;

        foreach ($partidas as $key) {
            $i++;
        }

         return $i;    
    }

    /*
     * Devuelve el resumen general de un contrato
     */ 
    public static function resumenContrato($id_contrato)
    {
        $contrato = Contratos::find($id_contrato);
        $estadoPagosContrato = Pagos::estadoPagosContrato($id_contrato);

        $valor_Contrato = Presupuestos::valorContrato($id_contrato);
        $monto_PagarContrato = Pagos::montoPagarContrato($id_contrato);
        $enviado_Pagar = $estadoPagosContrato[0];
        $total_Pagado = $estadoPagosContrato[1];
        $faltante_Pagar = $estadoPagosContrato[2];
        $faltante_Enviar_Pagar = $monto_PagarContrato - $enviado_Pagar;

        $st_codContrato = $contrato->nro_Contrato;
        $codContrato = str_replace(chr(34), "''", $st_codContrato);
        
        $st_nombreContrato = $contrato->descripcion.'';
        $nombreContrato = str_replace(chr(34), "''", $st_nombreContrato);
        
        $st_nombreProveedor = $contrato->empresaProveedor->nombre_Empresa.'';
        $nombreProveedor = str_replace(chr(34), "''", $st_nombreProveedor);

        $j1 =   '{"id":"'.$contrato->id.
                '","nro_contrato":"'.$codContrato.
                '","nombre_contratista":"'.$nombreProveedor.
                '","descripcion_Contrato":"'.$nombreContrato.
                '","valor_Contrato":"'.$valor_Contrato.
                '","monto_Pagar_Contrato":"'.$monto_PagarContrato.
                '","enviado_Pagar_Contrato":"'.$enviado_Pagar.
                '","faltante_Enviar_Pagar_Contrato":"'.$faltante_Enviar_Pagar.
                '","total_Pagado_Contrato":"'.$total_Pagado.
                '","faltante_Pagar_Contrato":"'.$faltante_Pagar.'"}';   

        for ($i = 0; $i <= 31; ++$i) { 
            $j1 = str_replace(chr($i), "", $j1); 
        }
        $j1 = str_replace(chr(127), "", $j1);

        if (0 === strpos(bin2hex($j1), 'efbbbf')) {
           $j1 = substr($j1, 3);
        }
        $json = json_decode( $j1 );

        $error = json_last_error();
     //   return $j1;
        switch(json_last_error()) {
            case JSON_ERROR_NONE:
                return $json;
            break;
            case JSON_ERROR_DEPTH:
                return ' - Excedido tamaño máximo de la pila';
            break;
            case JSON_ERROR_STATE_MISMATCH:
                return ' - Desbordamiento de buffer o los modos no coinciden';
            break;
            case JSON_ERROR_CTRL_CHAR:
                return ' - Encontrado carácter de control no esperado';
            break;
            case JSON_ERROR_SYNTAX:
                return ' - Error de sintaxis, JSON mal formado';
            break;
            case JSON_ERROR_UTF8:
                return ' - Caracteres UTF-8 malformados, posiblemente están mal codificados';
            break;
            default:
                return ' - Error desconocido';
            break;
        }    
    }


    /*  
     *  Relaciones con otras Tablas
     */
	public function user()
    {
        return $this->belongsTo('SAC\User', 'usuario');
    }

    public function empresaProveedor()
    {
        return $this->belongsTo('SAC\Empresas', 'empresa_Proveedor');
    }

    public function proyecto()
    {
        return $this->belongsTo('SAC\Proyectos', 'cod_Proyecto');
    }

    public function moneda()
    {
        return $this->belongsTo('SAC\Monedas', 'moneda_contrato');
    }

    public function presupuestos()
    {
        return $this->hasMany('SAC\Presupuestos', 'contrato_id');
    }

    public function firmantes_OS()
    {
        return $this->hasMany('SAC\FirmasOrdenServicio', 'contrato_id');
    }

    public function firmantes_VAL()
    {
        return $this->hasMany('SAC\FirmasValuacion', 'contrato_id');
    }

    public function retenciones()
    {
        return $this->hasMany('SAC\RetencionesContrato', 'contrato_id');
    }

    public function valuaciones()
    {
        return $this->hasMany('SAC\Valuaciones', 'contrato_id');
    }

}

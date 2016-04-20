<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
								'IVA', 	                    // Es el impuesto que se debe cargar sobre cada valuacion.
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

}

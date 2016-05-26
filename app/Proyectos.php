<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use SAC\Contratos;
use DB;

class Proyectos extends Model
{
    use SoftDeletes;

    protected $table="Proyectos"; 

	protected $fillable = 	[
								'cod_Proyecto',			// Es el codigo del proyecto, es un codigo unico.
								'nombre_Proyecto', 		// Es el nombre descriptivo del proyecto.
								'ubicacion_Proyecto', 	// Es la direccion en donde se lleva a cabo el proyecto.
								'latitud', 				// Es la latitud en el mapa donde esta ubicado el proyecto.
								'longitud',				// Es la longitud en el mapa donde esta ubicado el proyecto.
								'empresa_id',			// Es la empresa cliente del proyecto.
								'estado_Proyecto',		// Es el estado del proyecto. (Activo, Inactivo)
								'usuario', 	
							];

	protected $dates = ['deleted_at'];		

	/*  
     *  Consultas Estáticas
     * ---------------------
     */

	public static function proyectoPorCodigo($codProyecto)
    {
         $data = DB::table('Proyectos')
             ->select('*')
             ->where('cod_Proyecto', $codProyecto)
             ->whereNull('deleted_at')
             ->get();

         return $data;    
    }


    /*
     *  Devuelve el resumen de un proyecto, indicando totales de cada contrato
     */
    public static function reumenContratos($proyecto_id)
    {
        $proyecto = Proyectos::find($proyecto_id);
        $contratos = $proyecto->contratos;

        $resumenProyecto = array();
        $i = 0;
        foreach ($contratos as $key) {
            $resumenProyecto[$i] = Contratos::resumenContrato($key->id);
            $i++;
        }

        return $resumenProyecto;
    }

    /*
     *  Devuelve los totales de un Proyecto
     */
    public static function reumenProyecto($proyecto_id)
    {
        $proyecto = Proyectos::find($proyecto_id);
        $resumenContratos = Proyectos::reumenContratos($proyecto_id);

        $valor_Proyecto = 0;
        $monto_Pagar_Proyecto = 0;
        $enviado_Pagar_Proyecto = 0;
        $faltante_Enviar_Pagar_Proyecto = 0;
        $total_Pagado_Proyecto = 0;
        $faltante_Pagar_Proyecto = 0;
    return $resumenContratos;
        foreach ($resumenContratos as $key) {
            
            $valor_Proyecto = $valor_Proyecto + $key->valor_Contrato;
            //return $valor_Proyecto;
            $monto_Pagar_Proyecto = $monto_Pagar_Proyecto + $key->monto_Pagar_Contrato;
            $enviado_Pagar_Proyecto = $enviado_Pagar_Proyecto + $key->enviado_Pagar_Contrato;
            $faltante_Enviar_Pagar_Proyecto = $faltante_Enviar_Pagar_Proyecto + $key->faltante_Enviar_Pagar_Contrato;
            $total_Pagado_Proyecto = $total_Pagado_Proyecto + $key->total_Pagado_Contrato;
            $faltante_Pagar_Proyecto = $faltante_Pagar_Proyecto + $key->faltante_Pagar_Contrato;

        }

        $porcentaje_Ejecutado = ($enviado_Pagar_Proyecto * 100) / $monto_Pagar_Proyecto;

        $j1 =   '{"id":"'.$proyecto->id.
                '","cod_Proyecto":"'.$proyecto->cod_Proyecto.
                '","nombre_Proyecto":"'.$proyecto->nombre_Proyecto.
                '","porcentaje_Ejecutado":"'.$porcentaje_Ejecutado.
                '","valor_Proyecto":"'.$valor_Proyecto.
                '","monto_Pagar_Proyecto":"'.$monto_Pagar_Proyecto.
                '","enviado_Pagar_Proyecto":"'.$enviado_Pagar_Proyecto.
                '","faltante_Enviar_Pagar_Proyecto":"'.$faltante_Enviar_Pagar_Proyecto.
                '","total_Pagado_Proyecto":"'.$total_Pagado_Proyecto.
                '","faltante_Pagar_Proyecto":"'.$faltante_Pagar_Proyecto.'"}';   

        for ($i = 0; $i <= 31; ++$i) { 
            $j1 = str_replace(chr($i), "", $j1); 
        }
        $j1 = str_replace(chr(127), "", $j1);

        if (0 === strpos(bin2hex($j1), 'efbbbf')) {
           $j1 = substr($j1, 3);
        }
        $json = json_decode( $j1 );

        $error = json_last_error();
        //return $j1;
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
     * -----------------------------
     */					

	public function user()
    {
        return $this->belongsTo('SAC\User', 'usuario');
    }

    public function empresa()
    {
        return $this->belongsTo('SAC\Empresas', 'empresa_id');
    }

    public function contratos()
    {
        return $this->hasMany('SAC\Contratos', 'cod_Proyecto');
    }

}

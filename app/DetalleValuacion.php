<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;	
use SAC\Presupuestos;
use DB;

class DetalleValuacion extends Model
{
    //use SoftDeletes;
    
    protected $table="Detalle_Valuacion"; 

	protected $fillable = 	[
								'cantidad_Realizada',		// Es la cantidad de unidades ejecutadas en esta valuacion.
								'monto', 					/* Es el monto que representa la cantidad realizada multiplicada 
															   por el precio unitario especificado en el presupuesto. */
								'valuacion_id', 			// Es el nro de contrato al que se asocia la valuacion.
								'cc_id', 					// Es el centro de costo de este avance de partida.
								'partida_id',				// Es la partida que fue movida en este detalle.																		
								'usuario', 					// Es el usuario que agrega la entrada en la tabla.
							];

	//protected $dates = ['deleted_at'];	

    /*  
     *  Consultas Estáticas
     * ---------------------
     */

    public static function detalleVal($valuacion)
    {
         $data = DB::table('Detalle_Valuacion')
             ->select('*')
             ->where('valuacion_id', $valuacion)
             ->whereNull('deleted_at')
             ->get();

        $detalleValuacion = array();  
        $i = 0;   
        foreach ($data as $key) {
            $detalleValuacion[$i] = DetalleValuacion::find($key->id);
            $i++;
        }     

         return $detalleValuacion;    
    }


    public static function nroDetalleVal($valuacion)
    {
         $select = DB::table('Detalle_Valuacion')
            ->select(DB::raw('count(*) as orden'))
             ->where('valuacion_id', $valuacion)
             ->whereNull('deleted_at')
             ->get();

        $orden = $select[0]->orden;
        return $orden;     
    }

    public static function montoTrabajadoValucion($valuacion)
    {
         $data = DB::table('Detalle_Valuacion')
             ->select('*')
             ->where('valuacion_id', $valuacion)
             ->whereNull('deleted_at')
             ->get();

        $montoTrabajado = 0;     
        foreach ($data as $key) {
                 $montoTrabajado = $montoTrabajado + $key->monto;
             }  

         return $montoTrabajado;    
    }

    public static function partidasMovidas($idvaluacion)
    {
        $valuacion = Valuaciones::find($idvaluacion);
         $data = DB::table('Detalle_Valuacion')
             ->select('*')
             ->leftJoin('Valuacion', 'Detalle_Valuacion.valuacion_id', '=', 'Valuacion.id')
             ->where('Valuacion.contrato_id', $valuacion->contrato_id)
             ->get();

         return $data;    
    }

    /*
     * Devuelve el total de cantidades ejecutadas sobre una partida
     */
    public static function cantidadTrabajadaPartidaTotal($partida)
    {
         $data = DB::table('Detalle_Valuacion')
             ->select('*')
             ->where('partida_id', $partida)
             ->whereNull('deleted_at')
             ->get();

        $cantidadAcumulada = 0;     
        foreach ($data as $key) {
                 $cantidadAcumulada = $cantidadAcumulada + $key->cantidad_Realizada;
             }     

         return $cantidadAcumulada;    
    }

    /*
     * Devuelve el total de montos ejecutadas sobre una partida
     */
    public static function montoTrabajadaPartidaTotal($partida)
    {
         $data = DB::table('Detalle_Valuacion')
             ->select('*')
             ->where('partida_id', $partida)
             ->whereNull('deleted_at')
             ->get();

        $montoAcumulado = 0;     
        foreach ($data as $key) {
                 $montoAcumulado = $montoAcumulado + $key->monto;
             }     

         return $montoAcumulado;    
    }	

    /*
     * Devuelve el total de cantidades ejecutadas sobre una partida asociada a un Centro de Costo
     */
    public static function cantidadTrabajadaPartida($partida, $cc)
    {
         $data = DB::table('Detalle_Valuacion')
             ->select('*')
             ->where([
                        'partida_id' => $partida,
                        'cc_id' =>  $cc
                    ])
             ->whereNull('deleted_at')
             ->get();

        $cantidadAcumulada = 0;     
        foreach ($data as $key) {
                 $cantidadAcumulada = $cantidadAcumulada + $key->cantidad_Realizada;
             }     

         return $cantidadAcumulada;    
    }   

    /*
     * Devuelve el total de cantidades faltantes sobre una partida
     */
    public static function cantidadFaltantePartida($partida, $cc)
    {
         $data = DB::table('Detalle_Valuacion')
             ->select('*')
             ->where([
                        'partida_id' => $partida,
                        'cc_id' =>  $cc
                    ])
             ->whereNull('deleted_at')
             ->get();

        $cantidadAcumulada = 0;     
        foreach ($data as $key) {
                 $cantidadAcumulada = $cantidadAcumulada + $key->cantidad_Realizada;
             }     

        $partidaObj = Presupuestos::find($partida);
        $cantTotal = $partidaObj->cantidad;
        $cantFaltante = $cantTotal - $cantidadAcumulada;
         return $cantFaltante;    
    }

    public static function cantidadFaltantePartidaTotal($partida)
    {
         $data = DB::table('Detalle_Valuacion')
             ->select('*')
             ->where('partida_id', $partida)
             ->whereNull('deleted_at')
             ->get();

        $cantidadAcumulada = 0;     
        foreach ($data as $key) {
                 $cantidadAcumulada = $cantidadAcumulada + $key->cantidad_Realizada;
             }     

        $partidaObj = Presupuestos::find($partida);
        $cantTotal = $partidaObj->cantidad;
        $cantFaltante = $cantTotal - $cantidadAcumulada;
         return $cantFaltante;    
    }
    /*
     * Devuelve el monto faltante por ejecutar sobre una partida
     */
    public static function montoFaltantePartida($partida, $cc)
    {
         $data = DB::table('Detalle_Valuacion')
             ->select('*')
             ->where([
                        'partida_id' => $partida,
                        'cc_id' =>  $cc
                    ])
             ->whereNull('deleted_at')
             ->get();

        $montoAcumulado = 0;     
        foreach ($data as $key) {
                 $montoAcumulado = $montoAcumulado + $key->monto;
             }     

        $partidaObj = Presupuestos::partida($partida);
        $montoTotal = $partidaObj[0]->monto_Total;
        $montoFaltante = $montoTotal - $montoAcumulado;
         return $montoFaltante;    
    }


    /*
     * Devuelve el monto ejecutado sobre una partida
     */
    public static function montoTrabajadoPartida($partida, $cc)
    {
         $data = DB::table('Detalle_Valuacion')
             ->select('*')
             ->where([
                        'partida_id' => $partida,
                        'cc_id' =>  $cc
                    ])
             ->whereNull('deleted_at')
             ->get();

        $montoAcumulado = 0;     
        foreach ($data as $key) {
                 $montoAcumulado = $montoAcumulado + $key->monto;
             }     

         return $montoAcumulado;    
    }	

     /*
     * Devuelve el monto ejecutado sobre una partida en un periodo
     */
    public static function montoTrabajadoPartidaPeriodo($id_detalleVal )
    {
        $detalleVal = DetalleValuacion::find($id_detalleVal);
         $data = DB::table('Detalle_Valuacion')
             ->select('*')
             ->where([
                        'partida_id' => $detalleVal->partida_id,
                        'cc_id' =>  $detalleVal->cc_id
                    ])
             ->whereNull('deleted_at')
             ->get();

        $detalleValuacion = array();  
        $i = 0;   
        foreach ($data as $key) {
            $detalleValuacion[$i] = DetalleValuacion::find($key->id);
            $i++;
        }

        $montoAcumulado = 0;     
        $cantidadAcumulada = 0;
        foreach ($detalleValuacion as $key) 
        {
            if ($key->valuacion->nro_Boletin <= $detalleVal->valuacion->nro_Boletin)
            {
                $montoAcumulado = $montoAcumulado + $key->monto;
                $cantidadAcumulada = $cantidadAcumulada + $key->cantidad_Realizada;
            }
            
        }     

        $j1 = '{"CantidadAcumulada":"'.$cantidadAcumulada.'","MontoAcumulado":"'.$montoAcumulado.'"}';

        $json = json_decode($j1); 

         return $json;    
    }	

    /*
     * Devuelve las cantidades y montos acumulados de una partida
     */
    public static function AcumuladoPartida($idpartida, $nroBoletin, $cc)
    {
         $data = DB::table('Detalle_Valuacion')
             ->select('*')
             ->where([
                        'partida_id' => $idpartida,
                        'cc_id' =>  $cc
                    ])  
             ->whereNull('deleted_at')
             ->get();
//return $data;
        $detalleValuacion = array();  
        $i = 0;   
        foreach ($data as $key) {
            $detalleValuacion[$i] = DetalleValuacion::find($key->id);
            $i++;
        }

        $partida = Presupuestos::partida($idpartida);

        $montoAcumulado = 0;     
        $cantidadAcumulada = 0;
        $montoTrabajado = 0;
        $cantidadTrabajada = 0;
        $cc = 0;
        foreach ($detalleValuacion as $key) 
        {
            if ($key->valuacion->nro_Boletin <= $nroBoletin)
            {
                $montoAcumulado = $montoAcumulado + $key->monto;
                $cantidadAcumulada = $cantidadAcumulada + $key->cantidad_Realizada;
                if ($key->cc_id != null) {
                    $cc = $key->cc->cod_CC;
                }
            }

            if($key->valuacion->nro_Boletin == $nroBoletin)
            {
                $cantidadTrabajada = $key->cantidad_Realizada;
                $montoTrabajado = $key->monto;
                if ($key->cc_id != null) {
                    $cc = $key->cc->cod_CC;
                }
            }
            
        }     

        $partida[0]->descripcion = str_replace(chr(34), "''", $partida[0]->descripcion);
        
        $j1 =   '{"CantidadAcumulada":"'.$cantidadAcumulada.
                '","MontoAcumulado":"'.$montoAcumulado.
                '","Partida":"'.$partida[0]->nro_Partida.
                '","CantidadTrabajada":"'.$cantidadTrabajada.
                '","MontoTrabajado":"'.$montoTrabajado.
                '","CC":"'.$cc.
                '","Descripcion":"'.$partida[0]->descripcion.
                '","Unidad":"'.$partida[0]->unidad.
                '","CantidadContratada":"'.$partida[0]->cantidad.
                '","PrecioUnitario":"'.$partida[0]->precio_Unitario.
                '","PrecioTotal":"'.$partida[0]->monto_Total.'"}';         

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

    public function cc()
    {
        return $this->belongsTo('SAC\CentrosCosto', 'cc_id');
    }

    public function partida()
    {
        return $this->belongsTo('SAC\Presupuestos', 'partida_id');
    }
}

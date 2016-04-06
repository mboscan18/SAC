<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class CentrosCosto extends Model
{
	use SoftDeletes;

    protected $table="CentrosCosto"; 

	protected $fillable = 	[
								'cod_CC', 			// Es el codigo que identifica al Centro de Costo.
								'descripcion_CC', 	// Es la decripción del centro de costo.
								'usuario',
							];

	protected $dates = ['deleted_at'];	

	/*  
     *  Consultas Estáticas
     * ---------------------
     */

    public static function allCC(){
        $data = DB::table('CentrosCosto')
             ->select('*')
             ->orderBy('cod_CC','asc')
             ->whereNull('deleted_at')
             ->get();

         return $data;
    }

	public static function CC($cc_id){
		$data = DB::table('CentrosCosto')
             ->select('*')
             ->where('id', $cc_id)
             ->get();

         return $data;
	}

	public function proyectos()
    {
        return $this->hasOne('SAC\Proyectos', 'cc_id');
    }						

	public function user()
    {
        return $this->belongsTo('SAC\User', 'usuario');
    }
}

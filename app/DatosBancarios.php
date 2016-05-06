<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DatosBancarios extends Model
{
    use SoftDeletes;

    protected $table="DatosBancarios"; 

	protected $fillable = 	[
								'nroCuentaBancario',		// Es el numero de cuenta bancario del proveedor.
								'nombreContacto', 			// Es el nombre del titular de la cuenta.
								'identificacionTitular', 	// Es rif, cedula o pasaporte del titular de la cuenta.	
								'telefono', 				// Telefono del titular de la cuenta.
								'email', 					// Email del titular de la cuenta
								'banco_id',					// Es el nombre del banco.
								'empresa_id',				// Es la empresa a la que pertenecen los datos bancarios.
								'tipoCuenta_id',			// Es el tipo de cuenta. (Ahorro, Corriente)		
								'usuario', 	
							];

	protected $dates = ['deleted_at'];		

	/*	
	 *	Relaciones con otras Tablas
	 */					

	public function user()
    {
        return $this->belongsTo('SAC\User', 'usuario');
    }

    public function empresa()
    {
        return $this->belongsTo('SAC\Empresas', 'empresa_id');
    }

    public function banco()
    {
        return $this->belongsTo('SAC\Bancos', 'banco_id');
    }

    public function tipoCuenta()
    {
        return $this->belongsTo('SAC\TiposCuenta', 'tipoCuenta_id');
    }
}

<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DatosBancarios extends Model
{
    use SoftDeletes;

    protected $table="DatosBancarios"; 

	protected $fillable = 	[
								'nroCuentaBancario',// Es el numero de cuenta bancario del proveedor.
								'nombreContacto', 	// Es el nombre del titular de la cuenta.
								'telefono', 		// Telefono del titular de la cuenta.
								'email', 			// Email del titular de la cuenta
								'nombreBanco',		// Es el nombre del banco.
								'empresa_id',		// Es la empresa a la que pertenecen los datos bancarios.
								'usuario', 	
								'tipoCuenta',		// Es el tipo de cuenta. (Ahorro, Corriente)		
								'identificacionTitular', 	
							];

	protected $dates = ['deleted_at'];							

	public function user()
    {
        return $this->belongsTo('SAC\User', 'usuario');
    }

    public function empresa()
    {
        return $this->belongsTo('SAC\Empresas', 'empresa_id');
    }
}

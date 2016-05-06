<?php

namespace SAC\Http\Requests;

use SAC\Http\Requests\Request;

class DatosBancariosRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nroCuentaBancario' => 'required|size:20|unique:DatosBancarios,nroCuentaBancario,'.$this->id,
            'nombreContacto'   => 'required',
            'identificacionTitular'=> 'required',
            'banco_id'       => 'required',
            'telefono'          => 'required|numeric',
            'email'             => 'required|email',
            'tipoCuenta_id'        => 'required',
            'empresa_id'        => 'required',
                        
        ];
    }

    public function messages()
    {
        return [
            'nombreProveedor.required'      => 'El Nombre del Titular es obligatorio.',
            'banco_id.required'          => 'El Nombre del Banco es obligatorio.',
            'telefono.required'             => 'El campo Telefono es obligatorio.',
            'email.required'                => 'El campo Email es obligatorio.',
            'tipoCuenta_id.required'           => 'El Tipo de Cuenta es obligatorio.',
            'nroCuentaBancario.required'    => 'El Numero de Cuenta es un dato obligatorio.',
            'identificacionTitular.required'   => 'La Identificacion del Titular es un dato obligatorio.',
            'empresa_id.required'   => 'La Empresa es un dato obligatorio.',

            'nroCuentaBancario.unique'  => 'Ya existe un Contacto Bancario con ese Numero de Cuenta',
            'nroCuentaBancario.numeric' => 'El Numero de Cuenta debe ser de tipo Numerico',
            'nroCuentaBancario.size'    => 'El Numero de Cuenta no es válido',
            'telefono.numeric'          => 'El Telefono debe ser de tipo Numerico',
            'email.email'               => 'El Email no es válido',

        ];
    }
}

<?php

namespace SAC\Http\Requests;

use SAC\Http\Requests\Request;

class ContratosRequest extends Request
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
            'cod_Proyecto'          => 'required|unique:Contratos,cod_Proyecto,'.$this->id.',id,nro_Contrato,'.$this->nro_Contrato,
            'nro_Contrato'          => 'required',
            'empresa_Proveedor'     => 'required',
            'moneda_contrato'       => 'required',
            'fecha_inicio'          => 'required|date',
            'fecha_fin'             => 'required|date|after:fecha_inicio',
            'fecha_firma'           => 'required|date',
                        
        ];
    }

    public function messages()
    {
        return [
            'cod_Proyecto.required'         => 'El Proyecto es un dato obligatorio.',
            'nro_Contrato.required'         => 'El Numero de Contrato es un dato obligatorio.',
            'empresa_Proveedor.required'    => 'La Empresa Proveedor es un dato obligatorio.',
            'fecha_inicio.required'         => 'La Fecha de inicio de Contrato es un dato obligatorio.',
            'fecha_fin.required'            => 'La Fecha de fin de Contrato es un dato obligatorio.',
            'fecha_firma.required'          => 'La Fecha de firma de Orden de Servicio es un dato obligatorio.',
            'moneda_contrato.required'      => 'La Moneda del contrato es un dato obligatorio.',    

            'fecha_fin.after'       => 'La Fecha de Fin de Contrato debe ser una fecha posterior a la Fecha de Inicio de Contrato',
            'fecha_firma.before'  => 'La Fecha de Firma de Contrato debe ser una fecha anterior o igual a la fecha de Inicio de Contrato',

            'cod_Proyecto.unique'   => 'Ya existe un Contrato con ese Numero para ese Proyecto',
            'nro_Contrato.unique'   => 'Ya existe un Contrato con ese Numero para ese Proyecto',
                        
        ];
    }
}

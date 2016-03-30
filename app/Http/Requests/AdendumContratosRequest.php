<?php

namespace SAC\Http\Requests;

use SAC\Http\Requests\Request;

class AdendumContratosRequest extends Request
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
            'fecha_inicio'          => 'required|date',
            'fecha_fin'             => 'required|date|after:fecha_inicio',
            'fecha_firma'           => 'required|date|before:fecha_inicio',
                        
        ];
    }

    public function messages()
    {
        return [
            'fecha_inicio.required'         => 'La Fecha de inicio de Contrato es un dato obligatorio.',
            'fecha_fin.required'            => 'La Fecha de fin de Contrato es un dato obligatorio.',
            'fecha_entrega.required'        => 'La Fecha de entrega de Contrato es un dato obligatorio.',

            'fecha_fin.after'       => 'La Fecha de Fin de Contrato debe ser una fecha posterior a la Fecha de Inicio Contrato',
            'fecha_entrega.before'  => 'La Fecha de Entrega de Contrato debe ser una fecha anterior a la fecha de Inicio Contrato',

                        
        ];
    }
}

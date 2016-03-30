<?php

namespace SAC\Http\Requests;

use SAC\Http\Requests\Request;

class ValuacionesRequest extends Request
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
        $fecha_inicio = $this->fecha_Inicio_Periodo;
        $fecha = date('m/d/Y', strtotime($fecha_inicio. ' - 1 days')); 
        return [
            'nro_Boletin'           => 'required|min:1|unique:Valuacion,nro_Boletin,'.$this->id.',id,contrato_id,'.$this->contrato_id,
            'fecha_Inicio_Periodo'  => 'required|date',
            'fecha_Fin_Periodo'     => 'required|date|after:'.$fecha,
            'fecha_Pago'            => 'required|date',
            'contrato_id'           => 'required',
            'IVA'                   => 'required',
                        
        ];
    }

    public function messages()
    {
        return [
            'fecha_Pago.required'           => 'La fecha de Pago del Boletín es un dato obligatorio.',
            'fecha_Inicio_Periodo.required' => 'La fecha de inicio de Período es un dato obligatorio.',
            'fecha_Fin_Periodo.required'    => 'La fecha de fin de Período es un dato obligatorio.',
            'contrato_id.required'          => 'El contrato es un dato obligatorio.',
            'IVA.required'                  => 'El Impuesto (IVA) es un dato obligatorio.',

            'fecha_Fin_Periodo.after'   => 'La Fecha de Fin de Período debe ser una fecha posterior a la Fecha de Inicio de Período',
            'fecha_Pago.after'         => 'La Fecha de Pago debe ser una fecha posterior a la Fecha de Fin de Período',

            'nro_Boletin.unique'     => 'Ya existe un Boletín de Valuación ese Número.',
            'nro_Boletin.min'     => 'No puede haber un Boletín con Número menor que Uno (1).',

        ];
    }
}

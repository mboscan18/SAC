<?php

namespace SAC\Http\Requests;

use SAC\Http\Requests\Request;

class PagosRequest extends Request
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
            'monto_Pago'        => 'required|numeric|max:'.$this->totalPagar_Form_hidden,
            'nroComprobante'    => 'required|unique:Pagos,nroComprobante,'.$this->id,
            'fechaEmision'      => 'required|date',
            'tiposPago_id'      => 'required',
            'datosBancarios_id' => 'required',
            'factura_id'        => 'required',
        ];
    }

    public function messages()
    {
        return [
            'monto_Pago.required'    => 'El Monto del Pago es un dato obligatorio.',
            'nroComprobante.required'         => 'El Número de Comprobante es una dato obligatorio.',
            'fechaEmision.required'         => 'La fecha de Emision del Pago es un dato obligatorio.',
            'tiposPago_id.required'            => 'El Tipo de Pago es un dato obligatorio.',
            'datosBancarios_id.required'          => 'El Contacto Bancario es un dato obligatorio.',
            'factura_id.required'         => 'La Factura es un dato obligatorio.',

            'monto_Pago.max'       => 'El Monto del Pago no puede ser mayor que el Monto Faltante por Pagar. '.number_format($this->totalPagar_Form_hidden, 2, ',','.'),

            'nroComprobante.unique'   => 'Ya existe un Pago con ese Número de Comprobante.',
                        
        ];
    }
}

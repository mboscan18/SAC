<?php

namespace SAC\Http\Requests;

use SAC\Http\Requests\Request;
use SAC\DetalleValuacion;
use SAC\CentrosCosto;

class DetalleValuacionRequest extends Request
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
            'partida_id'                => 'required|unique:Detalle_Valuacion,partida_id,'.$this->id.',id,valuacion_id,'.$this->valuacion_id.',cc_id,'.$this->cc_id,
            'valuacion_id'              => 'required',
            'cantidad_Realizada'        => 'required|numeric|max:'.$this->cant_MAX,
            'monto'                     => 'required',
                        
        ];
    }

    public function messages()
    {
        if ($this->cc_id) {
            $CC = CentrosCosto::CC($this->cc_id);
        }
        return [
            'partida_id.required'           => 'Es necesario que seleccione una partida.',
            'valuacion_id.required'         => 'La Valuacion es un dato obligatorio.',
            'cantidad_Realizada.required'   => 'La Cantidad Realizada es un dato obligatorio.',
            'monto.required'                => 'El monto Ejecutado es un dato obligatorio.',
            'cantidad_Realizada.max'        => 'La Cantidad Realizada no puede ser mayor que la Cantidad Faltante por Ejecutar. '.$this->cant_MAX,

            'partida_id.unique'     => 'Esa Partida ya fué movida en este Boletin bajo ese Centro de Costo.',
                        
        ];
    }
}

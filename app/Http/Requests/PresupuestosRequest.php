<?php

namespace SAC\Http\Requests;

use SAC\Http\Requests\Request;
use Input;

class PresupuestosRequest extends Request
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
            'nro_Partida'       => 'required|unique:Presupuesto,nro_Partida,'.Input::get('id').',id,contrato_id,'.$this->contrato_id,
            'contrato_id'       => 'required',
            'descripcion'       => 'required',
            'unidad'            => 'required',
            'monto_Total'            => 'required',
            'cantidad'            => 'required',
            'precio_Unitario'            => 'required',
                        
        ];
    }

    public function messages()
    {
        return [
            'cod_Proyecto.required'      => 'El Codigo de Proyecto es un dato obligatorio.',
            'nombre_Proyecto.required'   => 'El Nombre de Proyecto es un dato obligatorio.',
            'ubicacion_Proyecto.required'=> 'La Ubicacion del Proyecto es un dato obligatorio.',

            'nro_Partida.unique'   => 'Ya existe una Partida con ese Número.',
            
        ];
    }
}

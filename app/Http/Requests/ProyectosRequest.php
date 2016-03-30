<?php

namespace SAC\Http\Requests;

use SAC\Http\Requests\Request;

class ProyectosRequest extends Request
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
            'cod_Proyecto'      => 'required|unique:Proyectos,cod_Proyecto,'.$this->id,
            'nombre_Proyecto'   => 'required',
            'ubicacion_Proyecto'=> 'required',
            'estado_Proyecto'   => 'required',
                        
        ];
    }

    public function messages()
    {
        return [
            'cod_Proyecto.required'      => 'El Codigo de Proyecto es un dato obligatorio.',
            'nombre_Proyecto.required'   => 'El Nombre de Proyecto es un dato obligatorio.',
            'ubicacion_Proyecto.required'=> 'La Ubicacion del Proyecto es un dato obligatorio.',

            'cod_Proyecto.unique'   => 'Ya existe un Proyecto con ese Codigo',
            
        ];
    }
}

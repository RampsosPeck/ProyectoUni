<?php

namespace Infraestructura\Http\Requests;

use Infraestructura\Http\Requests\Request;

class ViajeUpdateRequest extends Request
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
            'entidad'   => 'required|regex:/^[a-z ñáéíóú-]+$/i|min:5|max:50',

            'objetivo'     => 'required|regex:/^[a-z ñáéíóú]+$/i|min:5|max:30',
            'tipo'         => 'required|in:Viaje de Práctica,Viaje de Inspección,Viaje Académico,Viaje de Cultura',
            'pasajeros'    => 'required|numeric',
            'fecha_inicial'=> 'required|date',
            'fecha_final'  => 'required|date',
        ];
    }
    public function messages()
    {
        return [
                'entidad.regex'   => 'En la entidad solo se aceptan letras',
                'objetivo.regex'  => 'En el Objetivo solo se aceptan letras',
        ];
    }
}

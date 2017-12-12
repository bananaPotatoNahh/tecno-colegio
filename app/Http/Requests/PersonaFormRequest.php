<?php

namespace colegio\Http\Requests;

use colegio\Http\Requests\Request;

class PersonaFormRequest extends Request
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
            'nombre'=>'required|max:500',
            'apellido'=>'required|max:500',
            'direccion'=>'required|max:500',
            'numerodocumento'=>'required|max:500',
            'correoelectronico'=>'required|max:500',
            'codigo'=>'required|max:500',


        ];
    }
}

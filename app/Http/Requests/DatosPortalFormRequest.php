<?php

namespace colegio\Http\Requests;

use colegio\Http\Requests\Request;

class DatosPortalFormRequest extends Request
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
        'mision'=>'required|max:5000',
        'vision'=>'required|max:5000',
            'objetivoGeneral'=>'required|max:5000',
            'descripcion'=>'required|max:9999',
            'logo'=>'required|max:250'
        ];
    }
}

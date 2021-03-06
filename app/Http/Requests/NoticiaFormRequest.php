<?php

namespace colegio\Http\Requests;

use colegio\Http\Requests\Request;

class NoticiaFormRequest extends Request
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
            'titulo'=>'required|max:500',
            'descripcion'=>'required|max:5000'

        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotasFormRequest extends FormRequest
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
          'nota1',
          'nota2',
          'nota3',
          'nota4',
          'estudiante_id',
          'tipo_evaluacion',
          'curso_id'
        ];
    }
}

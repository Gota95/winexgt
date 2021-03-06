<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagoFormRequest extends FormRequest
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
          'Num_comprobante',
          'Total',
          'Fecha',
          'Estado',
          'estudiante_id',
          'pago_id',
          'concepto_id'
        ];
    }
}

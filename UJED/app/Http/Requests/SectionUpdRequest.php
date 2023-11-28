<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionUpdRequest extends FormRequest
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
            'nombre' => 'required|in:General,Preferencial,Administrativos',
            'disponibilidad' => 'required|int',
            'estate_id' => 'required|int'
        ];
    }
}

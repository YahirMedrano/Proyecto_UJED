<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'nombre' => 'required|max:255|string',
            'descripcion' => 'required|max:255|string',
            'imagen' => 'required|mimes:jpg,png,jpeg|max:2048',
            'precio' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'duracion' => 'required|in:Menos de 1 hora,1 a 2 horas,2 a 3 horas,Mas de 3 horas'
        ];
    }
}

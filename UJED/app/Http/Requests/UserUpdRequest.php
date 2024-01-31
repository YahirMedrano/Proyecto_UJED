<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdRequest extends FormRequest
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
            'name' => 'required|max:255|string',
            'apellido_paterno' => 'required|max:255|string',
            'apellido_materno' => 'sometimes|max:255|string',
            'email' => 'required|max:255|string',
            'phone' => 'sometimes|max:10|string',
            'type' => 'required|in:Usuario,Administrador'    
        ];
    }
}

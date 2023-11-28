<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'apellido_materno' => 'max:255|string',
            'email' => 'required|max:255|string',
            'phone' => 'required|max:255|string',
            'password' => 'required|confirmed|max:255|string',
            'type' => 'required|in:Usuario,Administrador'
        ];
    }
}

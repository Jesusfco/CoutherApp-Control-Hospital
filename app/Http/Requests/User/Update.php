<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
            'email' => 'required|unique:users,email,' . $this->id,
            'cedula' => 'required|unique:users,cedula,' . $this->id,
            'no_folio' => 'required|unique:users,no_folio,' . $this->id,
            'no_empleado' => 'required',
        ];
    }
}

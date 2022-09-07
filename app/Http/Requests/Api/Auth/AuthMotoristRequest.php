<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AuthMotoristRequest extends FormRequest
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
            'cpf' => ['required', 'min:11', 'max:11'],
            'password' => [ 'required', 'min:4', 'max:4', 'regex:/[0-9]/'],
            'device_name' => ['required', 'string', 'max:200']
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'Senha',
            'cpf' => 'CPF'
        ];
    }
}

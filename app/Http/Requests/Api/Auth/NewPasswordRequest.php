<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class NewPasswordRequest extends FormRequest
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
            'password' => [
                'required',
                'min:4',
                'max:4',
                'regex:/[0-9]/',
            ],
            'cpf' => [
                'required',
                'string',
                'min:11',
                'max:11',
                'exists:users,cpf'
            ],
            'code' => [
                'required',
                'exists:password_resets,token'
            ]
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'Senha',
            'code' => 'Código',
            'cpf' => 'CPF'
        ];
    }
}

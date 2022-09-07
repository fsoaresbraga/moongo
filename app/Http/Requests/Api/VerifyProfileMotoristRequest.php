<?php

namespace App\Http\Requests\Api;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class VerifyProfileMotoristRequest extends FormRequest
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
    public function rules(User $user)
    {
        $uuid = $this->id;

        $rules = [
            'company' => [
                'required',
                'exists:companies,code'
            ],

            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($uuid)
            ],

            'phone' => [
                'required',
                'string',
                'min:11',
                'max:12',
                Rule::unique('users')->ignore($uuid)
            ],

            'cpf' => [
                'required',
                'string',
                'min:11',
                'max:11',
                Rule::unique('users')->ignore($uuid)
            ]
        ];

        return $rules;

    }

    public function attributes()
    {
        return [
            'company' => 'Companhia',
            'email' => 'E-mail',
            'cpf' => 'CPF',
            'phone' => 'Telefone',
        ];
    }
}

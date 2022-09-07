<?php

namespace App\Http\Requests\Api;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MotoristRequest extends FormRequest
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
            'name' => [
                'required',
                'min:3',
                'max:30'
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
            ],
            'date_birth' => [
                'required',
                'date_format:d/m/Y'
            ],
            'gender' => [
                'required',
                Rule::in(array_keys($user->genderOptions))
            ],
            'password' => [
                'required',
                'min:4',
                'max:4',
                'string',
                'regex:/[0-9]/',
            ],
            'image' => [
            ],

            //feature taxi
            'zipcode' => [
                'required',
                'min:8',
                'max:8',
                'string'
            ],
            'address' => [
                'required',
                'min:3',
                'max:100',
                'string'
            ],
            'address_number' => [
            ],
            'neighborhood' => [
                'required',
                'min:3',
                'max:100',
                'string'
            ],
            'complement' => [
            ],
            'state' => [
                'required',
                'min:2',
                'max:2',
                'string'
            ],
            'city' => [
                'required',
                'min:3',
                'max:100',
                'string'
            ],

            //car features
            'car_plate' => [
                'required',
                'min:7',
                'max:7',
                'string'
            ],
            'car_renamed' => [
                'required',
                'min:11',
                'max:11',
                'string'
            ],
            'model' => [
                'required',
                'string'
            ],
            'year' => [
                'required',
            ],
            'color' => [
                'required',
            ]

        ];

        if($this->method() == 'PUT') {
            $rules['password'] = ['min:4','max:4','integer','regex:/[0-9]/'];
            $rules['image'] = ['image','max:1024','dimensions:min_width=100,min_height=100,max_width=300,max_height=300','mimes:jpg,jpeg,png,svg'];
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'company' => 'Companhia',
            'name' => 'Nome',
            'email' => 'E-mail',
            'cpf' => 'CPF',
            'phone' => 'Telefone',
            'date_birth' => 'Data de Nascimento',
            'gender' => 'Gênero',
            'password' => 'Senha',
            'image' => 'Imagem',
            'zipcode' => 'CEP',
            'address' => 'Endereço',
            'address_number' => 'Número',
            'neighborhood' => 'Bairro',
            'complement' => 'Complemento',
            'state' => 'Estado',
            'city' => 'Cidade',
            'car_plate' => 'Placa',
            'car_renamed' => 'Renavam',
            'model' => 'Modelo',
            'year' => 'Ano',
            'color' => 'Cor',
        ];
    }
}

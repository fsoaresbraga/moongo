<?php

namespace App\Http\Requests;

use App\Models\Taxi;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TaxiRequest extends FormRequest
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
    public function rules(Taxi $taxi)
    {
        $uuid = $this->id;

        $rules = [

            'name' => [
                'required',
                'min:3',
                'max:30'
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('taxis')->ignore($uuid)
            ],

            'phone' => [
                'required',
                'string',
                'min:11',
                'max:12'
            ],
            'cpf' => [
                'required',
                'string',
                'min:11',
                'max:11',
                Rule::unique('taxis')->ignore($uuid)
            ],
            'date_birth' => [
                'required',
                'date_format:d/m/Y'
            ],
            'gender' => [
                'required',
                Rule::in(array_keys($taxi->genderOptions))
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
                'max:200',
                'string'
            ],
            'address_number' => [
            ],
            'neighborhood' => [
                'required',
                'min:3',
                'max:200',
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
                'max:200',
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
}

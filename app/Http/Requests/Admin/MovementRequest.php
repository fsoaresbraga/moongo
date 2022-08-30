<?php

namespace App\Http\Requests\Admin;

use App\Models\Movement;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class MovementRequest extends FormRequest
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
    public function rules(Movement $movement)
    {
        //$uuid = $this->id;

        $rules = [
            'origin' => [
                'required',
                'exists:origins,id'
            ],
            'destination' => [
                'required',
                'exists:destinations,id'
            ],
            'category_movement' => [
                'required',
                'exists:category_movements,id'
            ],

            'type_movement' => [
                'required',
                'exists:type_movements,id'

            ],

            'product' => [
                'required',
                'exists:products,id'
            ],

            'bar_code' => [
                'required',
            ],

            'quantity' => [
                'required'
            ],

            'date_expiration' => [
                'required',
                'date_format:d/m/Y'
            ],

            'cost' => [],

        ];

        return $rules;
    }

    protected function failedValidation(Validator $validator) {

        return back()->with(config('messages.verifyForm'))->withInput();
    }
}

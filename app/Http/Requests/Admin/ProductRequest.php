<?php

namespace App\Http\Requests\Admin;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class ProductRequest extends FormRequest
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
    public function rules(Product $product)
    {
        //$uuid = $this->id;

        $rules = [
            'category' => [
                'required',
                'exists:product_categories,id'
            ],
            'brand' => [
                'required',
                'exists:product_brands,id'
            ],
            'sku' => [
                'required'
            ],
            'title' => [
                'required',
                'min:3',
                'max:60'

            ],

            'cost' => [],
            'last_purchase_cost' => [],
            'average_cost' => [],
            'sale_price' => [],
        ];

        return $rules;
    }

    protected function failedValidation(Validator $validator) {

        return back()->with(config('messages.verifyForm'))->withInput();
    }
}

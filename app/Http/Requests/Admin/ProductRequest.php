<?php

namespace App\Http\Requests\Admin;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            //'cost_price' => [],
            //'average_cost' => [],
            //'price' => [],
        ]; 
        
        return $rules;
    }
}

/*

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
*/ 
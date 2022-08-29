<?php

namespace App\Repositories\Admin;

use App\Models\Product;

class ProductRepository {

    private $repo_product;

    public function __construct(Product $model_product) {
        $this->repo_product = $model_product;
    }

    public function productsAll() {
        return view('Admin.Product.index');
    }

    public function setStoreProduct(array $date) {
       $product = $this->repo_product->create([

            'brand_id' => $date['brand'],
            'category_id' => $date['category'],
            'sku' => $date['sku'],
            'title' => $date['title'],
            'cost_price' => isset($date['cost_price']) ? $date['cost_price'] : null,
            'average_cost' => isset($date['averenge_cost']) ? $date['averenge_cost'] : null,
            'price' => isset($date['price']) ? $date['price'] : null
            
       ]);

       if($product) {
            return true;
       }
        return false;
    }


}

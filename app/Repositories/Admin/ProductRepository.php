<?php

namespace App\Repositories\Admin;

use App\Models\Product;

class ProductRepository {

    private $repo_product;

    public function __construct(Product $model_product) {
        $this->repo_product = $model_product;
    }

    public function getProducts() {
        return $this->repo_product::with('brand', 'category')->orderBy('title', 'ASC')->get();
    }

    public function getOnlyProducts() {
        return $this->repo_product::orderBy('title', 'ASC')->get();
    }

    public function setStoreProduct(array $req) {
        
        $product = $this->repo_product->create([
            'brand_id' => $req['brand'],
            'category_id' => $req['category'],
            'sku' => $req['sku'],
            'title' => $req['title'],
            'cost' => isset($req['cost']) ? $this->convertDecimalValue($req['cost']) : null,
            'last_purchase_cost' => isset($req['last_purchase_cost']) ? $this->convertDecimalValue($req['last_purchase_cost']) : null,
            'sale_price' => isset($req['sale_price']) ? $this->convertDecimalValue($req['sale_price']) : null

       ]);

       if($product) {
            return true;
       }
        return false;
    }

    public function getProductById($id) {

        $product = $this->repo_product->find($id);

        if(isset($product)) {

            return $product;
        }

        return false;
    }


    public function setUpdateProduct($id, $req) {

        $product = $this->repo_product->find($id)->update([
            'brand_id' => $req['brand'],
            'category_id' => $req['category'],
            'sku' => $req['sku'],
            'title' => $req['title'],
            'cost' => isset($req['cost']) ? $this->convertDecimalValue($req['cost']) : null,
            'last_purchase_cost' => isset($req['last_purchase_cost']) ? $this->convertDecimalValue($req['last_purchase_cost']) : null,
            'sale_price' => isset($req['sale_price']) ? $this->convertDecimalValue($req['sale_price']) : null
        ]);

        if($product) {
            return true;
        }

        return false;

    }

    private function convertDecimalValue($money) {

        $cleanString = preg_replace('/([^0-9\.,])/i', '', $money);
        $onlyNumbersString = preg_replace('/([^0-9])/i', '', $money);

        $separatorsCountToBeErased = strlen($cleanString) - strlen($onlyNumbersString) - 1;

        $stringWithCommaOrDot = preg_replace('/([,\.])/', '', $cleanString, $separatorsCountToBeErased);
        $removedThousandSeparator = preg_replace('/(\.|,)(?=[0-9]{3,}$)/', '',  $stringWithCommaOrDot);

        return (float) str_replace(',', '.', $removedThousandSeparator);
    }


}

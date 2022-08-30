<?php

namespace App\Repositories\Admin;

use App\Models\Movements;
use App\Models\Product;

class MovementRepository {

    private $repo_movement;

    public function __construct(Movements $model_movement) {
        $this->repo_movement = $model_movement;
    }

    public function getMovements() {
        //return $this->repo_movement::with('brand', 'category')->orderBy('title', 'ASC')->get();
        return [];
    }

    public function setStoreProduct(array $req) {
        
        $product = $this->repo_movement->create([
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

        $product = $this->repo_movement->find($id);

        if(isset($product)) {

            return $product;
        }

        return false;
    }



    public function setUpdateProduct($id, $req) {

        $product = $this->repo_movement->find($id)->update([
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

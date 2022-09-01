<?php

namespace App\Repositories\Admin;

use App\Models\Product;
use App\Http\Controllers\Admin\FunctionsController;

class ProductRepository {

    private $repo_product;
    private $functions;

    public function __construct(Product $model_product) {
        $this->repo_product = $model_product;
        $this->functions = new FunctionsController();
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
            'image' => null,
            'cost' => isset($req['cost']) ? $this->functions->convertDecimalValue($req['cost']) : null,
            'last_purchase_cost' => isset($req['last_purchase_cost']) ? $this->functions->convertDecimalValue($req['last_purchase_cost']) : null,
            'sale_price' => isset($req['sale_price']) ? $this->functions->convertDecimalValue($req['sale_price']) : null

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
            'cost' => isset($req['cost']) ? $this->functions->convertDecimalValue($req['cost']) : null,
            'last_purchase_cost' => isset($req['last_purchase_cost']) ? $this->functions->convertDecimalValue($req['last_purchase_cost']) : null,
            'sale_price' => isset($req['sale_price']) ? $this->functions->convertDecimalValue($req['sale_price']) : null
        ]);

        if($product) {
            return true;
        }

        return false;

    }

    public function deleteProduct($id) {

        $product = $this->repo_product->find($id);

        if($product) {
            $product->update([
                'user_delete' => auth()->user()->id
            ]);

            $product->delete();
            return true;
        }

        return false;
    }

}

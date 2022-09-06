<?php

namespace App\Repositories\Admin;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\FunctionsController;

class ProductRepository {

    private $repo_product;
    private $functions;

    public function __construct(Product $model_product) {
        $this->repo_product = $model_product;
        $this->functions = new FunctionsController();
    }

    public function getProducts() {
        //return $this->repo_product::with('brand', 'category')->orderBy('title', 'ASC')->get();

        $products = DB::select("
                        SELECT
                        prod.id,
                        prod.title,
                        prod.sku,
                        prod.cost,
                        prod.sale_price,
                        prod.last_purchase_cost,
                        brand.name as brand,
                        cat.name as category,

                        SUM(IF(tp_mov.name='Entrada', mov.quantity, 0)) AS entry,

                        SUM(IF(tp_mov.name='Saída', mov.quantity, 0)) AS way_out,

                        SUM(IF(tp_mov.name='Entrada', mov.quantity, 0)) - SUM(IF(tp_mov.name='Saída', mov.quantity, 0)) as total


                        FROM products as prod

                            INNER JOIN product_brands as brand
                            ON prod.brand_id = brand.id

                            INNER JOIN product_categories as cat
                            ON prod.category_id = cat.id

                            INNER JOIN movements as mov
                            ON prod.id = mov.product_id

                            INNER JOIN origins as origin
                            ON origin.id = mov.origin_id

                            INNER JOIN destinations as destination
                            ON destination.id = mov.destination_id

                            INNER JOIN type_movements as tp_mov
                            ON tp_mov.id = mov.type_movement_id

                        WHERE
                            mov.deleted_at IS NULL
                        AND
                            ((origin.name = 'Compra' && destination.name = 'Estoque' && tp_mov.name = 'Entrada')
                        OR
                            (origin.name = 'Estoque' && destination.name = 'Carro' && tp_mov.name = 'Saída'))

                        group by prod.id;
                    ");

        return $products;
    }

    public function getOnlyProducts() {
        return $this->repo_product::orderBy('title', 'ASC')->get();
    }

    public function setStoreProduct(array $req) {

        $product = $this->repo_product->create([
            'category_id' => $req['category'],
            'brand_id' => $req['brand'],
            'sku' => $req['sku'],
            'title' => $req['description'],
            'cost' => isset($req['cost']) ? $this->functions->convertDecimalValue($req['cost']) : null,
            'last_purchase_cost' => isset($req['last_purchase_cost']) ? $this->functions->convertDecimalValue($req['last_purchase_cost']) : null,
            'sale_price' => isset($req['sale_price']) ? $this->functions->convertDecimalValue($req['sale_price']) : null,
            'average_cost' => null,
            'status' => 1,
            'image' => null,
            'user_delete' => null
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
            'title' => $req['description'],
            'cost' => isset($req['cost']) ? $this->functions->convertDecimalValue($req['cost']) : null,
            'status' => isset($req['status']) ? 1 : 0,
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

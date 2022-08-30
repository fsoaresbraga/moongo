<?php

namespace App\Repositories\Admin;

use App\Models\ProductBrand;

class ProductBrandRepository {

    private $model_brand;

    public function __construct(ProductBrand $model_brand) {
        $this->model_brand = $model_brand;
    }

    public function getBrands() {
        return $this->model_brand->where('status', '1')->orderBy('name', 'ASC')->get();
    }



}

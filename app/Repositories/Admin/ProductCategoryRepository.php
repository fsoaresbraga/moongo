<?php

namespace App\Repositories\Admin;

use App\Models\ProductCategory;

class ProductCategoryRepository {

    private $model_category;

    public function __construct(ProductCategory $model_category) {
        $this->model_category = $model_category;
    }

    public function getCategories() {
        return $this->model_category::where('status', '1')->orderBy('name', 'ASC')->get();
    }


}



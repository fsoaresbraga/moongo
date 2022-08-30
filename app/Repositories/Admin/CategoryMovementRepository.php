<?php

namespace App\Repositories\Admin;

use App\Models\CategoryMovement;


class CategoryMovementRepository {

    private $repo_category;

    public function __construct(CategoryMovement $model_destination) {
        $this->repo_category = $model_destination;
    }

    public function getCategoryMovement() {
        return $this->repo_category::where('status', '1')->orderBy('name', 'ASC')->get();
    }


}



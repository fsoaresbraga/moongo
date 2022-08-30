<?php

namespace App\Repositories\Admin;

use App\Models\Origin;

class OriginRepository {

    private $repo_origin;

    public function __construct(Origin $model_origin) {
        $this->repo_origin = $model_origin;
    }

    public function getOrigin() {
        return $this->repo_origin::where('status', '1')->orderBy('name', 'ASC')->get();
    }


}



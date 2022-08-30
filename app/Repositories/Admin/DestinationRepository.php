<?php

namespace App\Repositories\Admin;

use App\Models\Destination;


class DestinationRepository {

    private $repo_destiantion;

    public function __construct(Destination $model_destiantion) {
        $this->repo_destiantion = $model_destiantion;
    }

    public function getDestination() {
        return $this->repo_destiantion::where('status', '1')->orderBy('name', 'ASC')->get();
    }


}



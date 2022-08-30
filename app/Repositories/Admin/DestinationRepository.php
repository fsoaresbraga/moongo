<?php

namespace App\Repositories\Admin;

use App\Models\Destination;


class DestinationRepository {

    private $repo_destination;

    public function __construct(Destination $model_destination) {
        $this->repo_destination = $model_destination;
    }

    public function getDestination() {
        return $this->repo_destination::where('status', '1')->orderBy('name', 'ASC')->get();
    }


}



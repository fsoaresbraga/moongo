<?php

namespace App\Repositories\Admin;


use App\Models\TypeMovement;

class TypeMovementRepository {

    private $repo_type_movement;

    public function __construct(TypeMovement $model_type_movement) {
        $this->repo_type_movement = $model_type_movement;
    }

    public function getTypeMovement() {
        return $this->repo_type_movement::where('status', '1')->orderBy('name', 'ASC')->get();
    }


}



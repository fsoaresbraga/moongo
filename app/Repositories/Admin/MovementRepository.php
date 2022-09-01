<?php

namespace App\Repositories\Admin;

use Carbon\Carbon;
use App\Models\Movement;
use Illuminate\Support\Str;
use App\Http\Controllers\Admin\FunctionsController;

class MovementRepository {

    private $repo_movement;
    private $functions;

    public function __construct(Movement $model_movement) {
        $this->repo_movement = $model_movement;
        $this->functions = new FunctionsController();
    }

    public function getMovements() {
        return $this->repo_movement::with('product', 'origin', 'destination', 'categoryMovement', 'typeMovement', 'user')
                                    ->orderBy('created_at', 'DESC')->get();

    }

    public function setStoreMovement(array $req) {


        $movement = $this->repo_movement->create([

            'user_id' => auth()->user()->id,
            'origin_id' => $req['origin'],
            'destination_id' => $req['destination'],
            'category_movement_id' => $req['category_movement'],
            'type_movement_id' => $req['type_movement'],
            'product_id' => $req['product'],
            'bar_code' => $req['bar_code'],
            'quantity' => $req['quantity'],
            'expiration' => isset($req['date_expiration']) ? Carbon::parse($req['date_expiration'])->format('Y-m-d') : null,
            'cost'=> 0
       ]);

       if($movement) {
            return true;
       }
        return false;
    }

    public function getMovementById($id) {

        $movement = $this->repo_movement->find($id);

        if(isset($movement)) {

            return $movement;
        }

        return false;
    }

    public function setUpdateMovement($id, $req) {

        $movement = $this->repo_movement->find($id)->update([
            'user_id' => auth()->user()->id,
            'origin_id' => $req['origin'],
            'destination_id' => $req['destination'],
            'category_movement_id' => $req['category_movement'],
            'type_movement_id' => $req['type_movement'],
            'product_id' => $req['product'],
            'bar_code' => $req['bar_code'],
            'quantity' => $req['quantity'],
            'expiration' => isset($req['date_expiration']) ? Carbon::parse($req['date_expiration'])->format('Y-m-d') : null,
            'cost'=> 0
        ]);

        if($movement) {

            return true;
        }

        return false;

    }

    public function deleteMovement($id) {

        $movement = $this->repo_movement->find($id);

        if($movement) {
            $movement->update([
                'user_delete' => auth()->user()->id
            ]);

            $movement->delete();
            return true;
        }

        return false;
    }




}

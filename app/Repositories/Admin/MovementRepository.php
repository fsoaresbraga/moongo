<?php

namespace App\Repositories\Admin;

use Carbon\Carbon;
use App\Models\Movement;
use App\Models\Destination;
use App\Models\Origin;
use App\Models\TypeMovement;


class MovementRepository {

    private $repo_movement;
    private $repo_oringin;
    private $repo_destination;
    private $repo_type_movement;


    public function __construct(
        Movement $model_movement,
        Origin $model_origin,
        Destination $model_destination,
        TypeMovement $model_type_movement
    ) {
        $this->repo_movement = $model_movement;
        $this->repo_oringin = $model_origin;
        $this->repo_destination = $model_destination;
        $this->repo_type_movement = $model_type_movement;
    }

    public function getMovements() {
        return $this->repo_movement::with('product', 'origin', 'destination','typeMovement', 'user')
                                    ->orderBy('created_at', 'DESC')->get();

    }

    public function setStoreMovement(array $req) {

        if($req['movement'] == "Carro -> Perca") {
            $origin        = $this->repo_oringin::where('name', 'Carro')->first();
            $destination   = $this->repo_destination::where('name', 'Perda')->first();
            $type_movement = $this->repo_type_movement::where('name', 'Saída')->first();

            return $this->createNewMovement($req, $origin, $destination, $type_movement);
        }

        if($req['movement'] == "Carro -> Venda") {
            $origin        = $this->repo_oringin::where('name', 'Carro')->first();
            $destination   = $this->repo_destination::where('name', 'Venda')->first();
            $type_movement = $this->repo_type_movement::where('name', 'Saída')->first();
            
            return $this->createNewMovement($req, $origin, $destination, $type_movement);
        }
      
        if($req['movement'] == "Compra -> Estoque") {
            $origin        = $this->repo_oringin::where('name', 'Compra')->first();
            $destination   = $this->repo_destination::where('name', 'Estoque')->first();
            $type_movement = $this->repo_type_movement::where('name', 'Entrada')->first();

            return $this->createNewMovement($req, $origin, $destination, $type_movement);
        }

        if($req['movement'] == "Estoque -> Carro") {
            
            //entrada estoque veiculo
            $origin        = $this->repo_oringin::where('name', 'Carro')->first();
            $destination   = $this->repo_destination::where('name', 'Estoque')->first();
            $type_movement_entry = $this->repo_type_movement::where('name', 'Entrada')->first();
            
            $mov = [
                'origin' => $origin,
                'destination' => $destination,
                'type_movement_entry' => $type_movement_entry
            ];

            //saida estoque
            $origin        = $this->repo_oringin::where('name', 'Estoque')->first();
            $destination   = $this->repo_destination::where('name', 'Carro')->first();
            $type_movement = $this->repo_type_movement::where('name', 'Saída')->first();

            return $this->createNewMovement($req, $origin, $destination, $type_movement, $mov);
        }

        if($req['movement'] == "Estoque -> Perda") {
            $origin        = $this->repo_oringin::where('name', 'Estoque')->first();
            $destination   = $this->repo_destination::where('name', 'Perda')->first();
            $type_movement = $this->repo_type_movement::where('name', 'Saída')->first();

            return $this->createNewMovement($req, $origin, $destination, $type_movement);
        }    
      
    }

    private function createNewMovement($req, $origin, $destination, $type_movement, $mov = null) {
        $movement = $this->repo_movement->create([
            'user_id' => auth()->user()->id,
            'origin_id' => $origin->id,
            'destination_id' => $destination->id,
            'type_movement_id' => $type_movement->id,
            'product_id' => $req['product'],
            'quantity' => $req['quantity'],
            'expiration' => isset($req['date_expiration']) ? Carbon::parse($req['date_expiration'])->format('Y-m-d') : null,
            'cost'=> 0
       ]);

       if($mov != null) {

            $this->repo_movement->create([
                'user_id' => auth()->user()->id,
                'origin_id' => $mov['origin']->id,
                'destination_id' => $mov['destination']->id,
                'type_movement_id' => $mov['type_movement_entry']->id,
                'product_id' => $req['product'],
                'quantity' => $req['quantity'],
                'expiration' => isset($req['date_expiration']) ? Carbon::parse($req['date_expiration'])->format('Y-m-d') : null,
                'cost'=> 0
            ]);
       }
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

        if($req['movement'] == "Carro -> Perca") {
            $origin        = $this->repo_oringin::where('name', 'Carro')->first();
            $destination   = $this->repo_destination::where('name', 'Perda')->first();
            $type_movement = $this->repo_type_movement::where('name', 'Saída')->first();
        }

        if($req['movement'] == "Carro -> Venda") {
            $origin        = $this->repo_oringin::where('name', 'Carro')->first();
            $destination   = $this->repo_destination::where('name', 'Venda')->first();
            $type_movement = $this->repo_type_movement::where('name', 'Saída')->first();
        }
      
        if($req['movement'] == "Compra -> Estoque") {
            $origin        = $this->repo_oringin::where('name', 'Compra')->first();
            $destination   = $this->repo_destination::where('name', 'Estoque')->first();
            $type_movement = $this->repo_type_movement::where('name', 'Entrada')->first();
        }

        if($req['movement'] == "Estoque -> Carro") {
            $origin        = $this->repo_oringin::where('name', 'Estoque')->first();
            $destination   = $this->repo_destination::where('name', 'Carro')->first();
            $type_movement = $this->repo_type_movement::where('name', 'Saída')->first();
        }

        if($req['movement'] == "Estoque -> Perda") {
            $origin        = $this->repo_oringin::where('name', 'Estoque')->first();
            $destination   = $this->repo_destination::where('name', 'Perda')->first();
            $type_movement = $this->repo_type_movement::where('name', 'Saída')->first();
        }


        $movement = $this->repo_movement->find($id)->update([
            'user_id' => auth()->user()->id,
            'origin_id' => $origin->id,
            'destination_id' => $destination->id,
            'type_movement_id' => $type_movement->id,
            'product_id' => $req['product'],
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

        $movement = $this->repo_movement
        ->with('product', 'origin', 'destination',
                'categoryMovement', 'typeMovement', 'user')
        ->find($id);
    
        if(
            $movement->origin->name == "Estoque" && 
            $movement->destination->name == "Carro" && 
            $movement->typeMovement->name == "Saída"
        ) {
            $get_movement_entry_delete =  $this->repo_movement
            ->with(
                'product', 'origin', 'destination',
                'typeMovement', 'user'
            )
                    
            ->whereHas('product', function ($query) use($movement) {
                return $query->where('id', $movement->product->id);
            })
            
            ->whereHas('origin', function ($query) {
                return $query->where('name', "Carro");
            })

            ->whereHas('destination', function ($query) {
                return $query->where('name', "Estoque");
            })

            ->whereHas('typeMovement', function ($query) {
                return $query->where('name', "Entrada");
            })

            ->whereHas('user', function ($query) use($movement) {
                return $query->where('id', $movement->user->id);
            })
            ->where('quantity', $movement->quantity)
            ->first();

           //return $get_movement_entry_delete;
            $get_movement_entry_delete->update([
                'user_delete' => auth()->user()->id
            ]);

            $get_movement_entry_delete->delete();
        }

       
        if(
            $movement->origin->name == "Carro" && 
            $movement->destination->name == "Estoque" && 
            $movement->typeMovement->name == "Entrada"
        ) {
        
            
            $get_movement_exit_delete =  $this->repo_movement
            ->with(
                'product', 'origin', 'destination',
                'typeMovement', 'user'
            )

            ->whereHas('product', function ($query) use($movement){
                return $query->where('id', $movement->product->id);
            })
            
            ->whereHas('origin', function ($query) {
                return $query->where('name', "Estoque");
            })

            ->whereHas('destination', function ($query) {
                return $query->where('name', "Carro");
            })

            ->whereHas('typeMovement', function ($query) {
                return $query->where('name', "Saída");
            })

            ->whereHas('user', function ($query) use($movement) {
                return $query->where('id', $movement->user->id);
            })

            ->where('quantity', $movement->quantity)
            ->first();

            //return $get_movement_exit_delete;
            
            $get_movement_exit_delete->update([
                'user_delete' => auth()->user()->id
            ]);

           $get_movement_exit_delete->delete();
        }

       
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

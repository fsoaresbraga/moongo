<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MovementRequest;
use App\Repositories\Admin\OriginRepository;
use App\Repositories\Admin\ProductRepository;
use App\Repositories\Admin\MovementRepository;
use App\Repositories\Admin\DestinationRepository;
use App\Repositories\Admin\TypeMovementRepository;


class MovementController extends Controller
{
    private $repo_movement;
    private $repo_product;

    public function __construct(
        MovementRepository $movementRepository,
        ProductRepository $productRepository) {
            $this->repo_movement = $movementRepository;
            $this->repo_product = $productRepository;
    }

    public function index() {
        $movements = $this->repo_movement->getMovements();

        return view('Admin.Movement.index', compact('movements'));
    }

    public function create() {
        
        $products = $this->repo_product->getOnlyProducts();
        return view('Admin.Movement.create', compact('products'));
    }

    public function show($id) {

        $movement = $this->repo_movement->getMovementById($id);
        $products = $this->repo_product->getOnlyProducts();

        if(gettype($movement) != 'boolean') {
            return view('Admin.Movement.show',
                compact(
                    'movement', 'products'
                )
            );
        }

        return redirect()->route('admin.product.index')->with(config('messages.movementNotFound'));

    }

    public function store(MovementRequest $request) {

        $movement = $this->repo_movement->setStoreMovement($request->validated());

        if($movement) {
            return redirect()->route('admin.movement.index')->with(config('messages.successCreateMovement'));
        }

        return back()->with(config('messages.errorCreateMovement'))->withInput();

    }

    public function update($id, MovementRequest $request) {

        $movement = $this->repo_movement->setUpdateMovement($id, $request->validated());

        if($movement) {
            return redirect()->route('admin.movement.index')->with(config('messages.successUpdateMovement'));
        }

        return back()->with(config('messages.errorUpdateMovement'))->withInput();
    }

    public function delete($id) {

        $movement = $this->repo_movement->deleteMovement($id);
        
        if($movement) {
            return response()->json(['type' => 'success']);
        }
        return response()->json(['type' => 'error']);

    }
}

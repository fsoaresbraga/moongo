<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\CategoryMovementRepository;
use App\Repositories\Admin\DestinationRepository;
use App\Repositories\Admin\MovementRepository;
use App\Repositories\Admin\OriginRepository;
use App\Repositories\Admin\ProductRepository;
use App\Repositories\Admin\TypeMovementRepository;

class MovementController extends Controller
{
    private $repo_movement;
    private $repo_origin;
    private $repo_destination;
    private $repo_category_movement;
    private $repo_type_movement;
    private $repo_product;
    
    public function __construct(
        MovementRepository $movementRepository,
        OriginRepository $originRepository,
        DestinationRepository $destinationRepository,
        CategoryMovementRepository $categoryMovementRepository,
        TypeMovementRepository $typeMovementRepository,
        ProductRepository $productRepository) {
            $this->repo_movement = $movementRepository;
            $this->repo_origin = $originRepository;
            $this->repo_destination = $destinationRepository;
            $this->repo_category_movement = $categoryMovementRepository;
            $this->repo_type_movement = $typeMovementRepository;
            $this->repo_product = $productRepository;
    }

    public function index() {
        $movements = $this->repo_movement->getMovements();
        
        return view('Admin.Movement.index', compact('movements'));
    }

    public function create() {
        $origins = $this->repo_origin->getOrigin();
        $destinations = $this->repo_destination->getDestination();
        $categories = $this->repo_category_movement->getCategoryMovement();
        $types = $this->repo_type_movement->getTypeMovement();
        $products = $this->repo_product->getOnlyProducts();


        return view('Admin.Movement.create', compact('origins', 'destinations','categories','types', 'products'));
    }

    public function show($id) {

        $product = $this->repo_movement->getProductById($id);
        $categories = $this->repo_category->getCategories();
        $brands = $this->repo_brand->getBrands();

        if(gettype($product) != 'boolean') {
            return view('Admin.Product.show', compact('product', 'categories', 'brands'));
        }

        return redirect()->route('admin.product.index')->with(config('messages.productNotFound'));

    }

    public function store(ProductRequest $request) {

        $product = $this->repo_movement->setStoreProduct($request->validated());

        if($product) {
            return redirect()->route('admin.product.index')->with(config('messages.successCreateProduct'));
        }

        return back()->with(config('messages.errorCreateProduct'))->withInput();

    }

    public function update($id, ProductRequest $request) {

        $product = $this->repo_movement->setUpdateProduct($id, $request->validated());

        if($product) {
            return redirect()->route('admin.product.index')->with(config('messages.successUpdateProduct'));
        }

        return back()->with(config('messages.errorUpdateProduct'))->withInput();
    }
}

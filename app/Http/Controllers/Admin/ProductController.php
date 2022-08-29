<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Repositories\Admin\ProductBrandRepository;
use App\Repositories\Admin\ProductCategoryRepository;
use App\Repositories\Admin\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $repo_product;
    private $repo_brand;
    private $repo_category;
    public function __construct(
        ProductRepository $productRepository, 
        ProductBrandRepository $productBrandRepository,
        ProductCategoryRepository $productCategoryRepository) {
            $this->repo_product = $productRepository;
            $this->repo_brand = $productBrandRepository;
            $this->repo_category = $productCategoryRepository;
    }

    public function index() {
        return view('Admin.Product.index');
    }

    public function create() {
        $categories = $this->repo_category->getCategories();
        $brands = $this->repo_brand->getBrands();

        return view('Admin.Product.create', compact('categories', 'brands'));
    }

    public function store(ProductRequest $request) {

        $product = $this->repo_product->setStoreProduct($request->validated());

        if($product) {
            return redirect()->route('admin.product.index');
        }
        return back()->withInput();

    }
}

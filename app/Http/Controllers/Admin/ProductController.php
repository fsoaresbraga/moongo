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
        $products = $this->repo_product->getProducts();

        return view('Admin.Product.index', compact('products'));
    }

    public function create() {
        $categories = $this->repo_category->getCategories();
        $brands = $this->repo_brand->getBrands();

        return view('Admin.Product.create', compact('categories', 'brands'));
    }

    public function show($id) {

        $product = $this->repo_product->getProductById($id);
        $categories = $this->repo_category->getCategories();
        $brands = $this->repo_brand->getBrands();

        if(gettype($product) != 'boolean') {
            return view('Admin.Product.show', compact('product', 'categories', 'brands'));
        }

        return redirect()->route('admin.product.index')->with(config('messages.productNotFound'));

    }

    public function store(ProductRequest $request) {

        $product = $this->repo_product->setStoreProduct($request->validated());

        if($product) {
            return redirect()->route('admin.product.index')->with(config('messages.successCreateProduct'));
        }

        return back()->with(config('messages.errorCreateProduct'))->withInput();

    }

    public function update($id, ProductRequest $request) {

        $product = $this->repo_product->setUpdateProduct($id, $request->validated());

        if($product) {
            return redirect()->route('admin.product.index')->with(config('messages.successUpdateProduct'));
        }

        return back()->with(config('messages.errorUpdateProduct'))->withInput();
    }
}

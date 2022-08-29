<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    ProductController
};


Route::group(['prefix'=>'area_restrita','as'=>'admin.'], function(){
    Route::get('/dashboard', function() {
        return view('Admin.dashboard');
    })->name('dashboard');

    Route::get('/produtos', [ProductController::class, 'index'])->name('product.index');
    Route::get('/criar/produto', [ProductController::class, 'create'])->name('product.create');
    Route::post('/criar/produto', [ProductController::class, 'store'])->name('product.store');
});


Route::get('/', function() {
    return "WEB";
});
/*
Route::get('/', [SiteController::class, 'home'])->name('home.site');
Route::get('/{hash}', [SiteController::class, 'index'])->name('home');
Route::get('/get/carrinho', [SiteController::class, 'addCart'])->name('cart.add');
Route::get('/{hash}/carrinho', [SiteController::class, 'cartView'])->name('cart.view');
Route::get('/{movement}/checkout', [SiteController::class, 'checkoutView'])->name('checkout.view');
Route::post('/send/carrinho', [SiteController::class, 'storeCart'])->name('cart.store');
*/

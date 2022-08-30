<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    ProductController,
    MovementController
};


Route::group(['prefix'=>'area_restrita','as'=>'admin.'], function(){
    Route::get('/dashboard', function() {
        return view('Admin.dashboard');
    })->name('dashboard');

    /*ROTAS DE PRODUTOS*/
    Route::get('/produtos', [ProductController::class, 'index'])->name('product.index');
    Route::get('/criar/produto', [ProductController::class, 'create'])->name('product.create');
    Route::get('/editar/produto/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::post('/criar/produto', [ProductController::class, 'store'])->name('product.store');
    Route::post('/editar/produto/{id}', [ProductController::class, 'update'])->name('product.edit');
    /*ROTAS DE PRODUTOS*/


    /*ROTAS DE MOVIMENTAÇÕES*/
    Route::get('/movimentaçoes', [MovementController::class, 'index'])->name('movement.index');
    Route::get('/criar/movimentacao', [MovementController::class, 'create'])->name('movement.create');
    Route::get('/editar/movimentacao/{id}', [MovementController::class, 'show'])->name('movement.show');
    Route::post('/criar/movimentacao', [MovementController::class, 'store'])->name('movement.store');
    Route::post('/editar/movimentacao/{id}', [MovementController::class, 'update'])->name('movement.edit');
    /*ROTAS DE MOVIMENTAÇÕES*/
    
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

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    ProductController,
    MovementController
};
use App\Http\Controllers\Admin\Auth\{
    LoginController
};
use App\Http\Controllers\Passenger\{
    AppController
};


Route::group(['prefix'=>'area_restrita','as'=>'admin.'], function(){

    Route::get('/', [LoginController::class, 'index'])->name('login.index');
    Route::post('/',[LoginController::class, 'authenticate'])->name('login.authenticate');
    Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout')->middleware('expireCache');

    Route::middleware(['auth', 'expireCache'])->group(function () {

        Route::get('/dashboard', function() {
            return view('Admin.dashboard');
        })->name('dashboard');

        /*ROTAS DE PRODUTOS*/
        Route::get('/produtos', [ProductController::class, 'index'])->name('product.index');
        Route::get('/criar/produto', [ProductController::class, 'create'])->name('product.create');
        Route::get('/editar/produto/{id}', [ProductController::class, 'show'])->name('product.show');
        Route::post('/criar/produto', [ProductController::class, 'store'])->name('product.store');
        Route::post('/editar/produto/{id}', [ProductController::class, 'update'])->name('product.edit');
        Route::delete('/deletar/produto/{id}', [ProductController::class, 'delete'])->name('product.delete');
        /*ROTAS DE PRODUTOS*/


        /*ROTAS DE MOVIMENTAÇÕES*/
        Route::get('/movimentaçoes', [MovementController::class, 'index'])->name('movement.index');
        Route::get('/criar/movimentacao', [MovementController::class, 'create'])->name('movement.create');
        Route::get('/editar/movimentacao/{id}', [MovementController::class, 'show'])->name('movement.show');
        Route::post('/criar/movimentacao', [MovementController::class, 'store'])->name('movement.store');
        Route::post('/editar/movimentacao/{id}', [MovementController::class, 'update'])->name('movement.edit');
        Route::delete('/deletar/movimentacao/{id}', [MovementController::class, 'delete'])->name('movement.delete');
        /*ROTAS DE MOVIMENTAÇÕES*/
    });

});


Route::get('/', function() {
    return "WEB";
});

//Route::get('/', [Passenger\AppController::class, 'home'])->name('home.site');
Route::get('/{hash}', [AppController::class, 'index'])->name('home');
Route::get('/get/carrinho', [AppController::class, 'addCart'])->name('cart.add');
Route::get('/{hash}/carrinho', [AppController::class, 'cartView'])->name('cart.view');
Route::get('/{movement}/checkout', [AppController::class, 'checkoutView'])->name('checkout.view');
Route::post('/send/carrinho', [AppController::class, 'storeCart'])->name('cart.store');


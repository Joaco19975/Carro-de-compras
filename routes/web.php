<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InShoppingCartsController;
use App\Http\Controllers\ShoppingCartsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/carrito', [ShoppingCartsController::class, 'index']);

Auth::routes();

Route::resource('products', ProductController::class);
Route::resource('in_shopping_carts', InShoppingCartsController::class, [
    'only' => ['store', 'destroy']
]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

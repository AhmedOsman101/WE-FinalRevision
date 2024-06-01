<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class, 'index']);

// make routes for the products controller
Route::resource('products', ProductController::class);
/*
Routes:
    GET     products ............. products.index
    GET     products/{id} ........ products.show
    GET     products/create ...... products.create
    POST    products ............. products.store
    GET     products/{id}/edit ... products.edit
    PUT     products/{id} ........ products.update
    DELETE  products/{id} ........ products.destroy
*/

// DO NOT EDIT BELOW THIS LINE, IT'S FOR TESTING ONLY
Route::post('products/seed', [ProductController::class, 'seed'])->name('seed');

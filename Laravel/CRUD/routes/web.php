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

Route::get('/', function () {
    return view('welcome');
});


// make routes for the products controller
Route::apiResource('products', ProductController::class);
/*
Routes:
    GET     api/products ............. products.index
    GET     api/products/{id} ........ products.show
    POST    api/products ............. products.store
    PUT     api/products/{id} ........ products.update
    DELETE  api/products/{id} ........ products.destroy
*/

// DO NOT EDIT BELOW THIS LINE, IT'S FOR TESTING ONLY
Route::post('products/seed', [ProductController::class, 'seed'])->name('seed');

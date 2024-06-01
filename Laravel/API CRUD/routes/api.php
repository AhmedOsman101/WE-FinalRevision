<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
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

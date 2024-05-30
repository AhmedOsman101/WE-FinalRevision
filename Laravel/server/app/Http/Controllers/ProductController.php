<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Throwable;

class ProductController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {

        // get all the products
        $products = Product::all();

        // return results
        return response()->json(compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        try {
            // create a new product
            $product = Product::insert($request->all());

            // return the product
            return response()->json([
                "message" => "Created successfully"
            ]);
        } catch (Throwable $error) {
            // catch any errors and return it
            return response()->json(["error" => $error], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        try {
            // get the product from the database by id
            $product = Product::find($id);

            // if not found display a 404 error
            if (empty($product)) {
                return response()->json(
                    ["error" => "Product not found"],
                    404 // 404 not found
                );
            }

            // if found return it
            return response()->json(compact('product'));
        } catch (Throwable $error) {
            // catch any errors and return it
            return response()->json(["error" => $error], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        try {
            // get the product from the database by id
            $product = Product::find($id);

            // if not found display a 404 error
            if (empty($product)) {
                return response()->json(
                    ["error" => "Product not found"],
                    404 // 404 not found
                );
            }

            // update the product's data
            $product->update($request->all());

            // return the product
            return response()->json([
                "message" => "Updated successfully"
            ]);
        } catch (Throwable $error) {
            // catch any errors and return it
            return response()->json(["error" => $error], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        try {
            // get the product from the database by id
            $product = Product::find($id);

            // if not found display a 404 error
            if (empty($product)) {
                return response()->json(
                    ["error" => "Product not found"],
                    404 // 404 not found
                );
            }

            // delete the product
            $product->delete();
            // return the product
            return response()->json([
                "message" => "Deleted successfully"
            ]);
        } catch (Throwable $error) {
            // catch any errors and return it
            return response()->json(["error" => $error], 500);
        }
    }
}

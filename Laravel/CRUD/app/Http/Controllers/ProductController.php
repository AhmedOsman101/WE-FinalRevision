<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Throwable;

class ProductController extends Controller {
    /**
     * Display all products
     * 
     */
    public function index() {

        // Get all products from the database
        $products = Product::all();

        // Return the view with the products data
        return view("AllProducts", compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     */
    public function create() {
        // Return the view for creating a new product
        return view('Create');
    }

    /**
     * Store a newly created resource in database.
     * 
     */
    public function store(Request $request) {
        try {
            // Create a new product with the request data
            Product::create($request->all());

            // Redirect to the products index page
            return redirect()->route('products.index');
        } catch (Throwable $error) {
            // Log the error and return
            dd($error);
        }
    }

    /**
     * Show the form for editing the specified resource.
     * 
     */
    public function edit(string $id) {
        // Get the product by ID
        $product = Product::find($id);

        // If product is not found, return a 404 error
        if (!$product) {
            dd('Product not found');
        }

        // Return the view with the product data for editing
        return view("Update", compact('product'));
    }

    /**
     * Update the specified product in database.
     * 
     */
    public function update(Request $request, $id) {
        try {
            // Get the product by ID
            $product = Product::find($id);

            // If product is not found, return a 404 error
            if (!$product) {
                dd('Product not found');
            }

            // Update the product with the request data
            $product->update($request->all());

            // Redirect to the products index page
            return redirect()->route('products.index');
        } catch (Throwable $error) {
            // Log the error and return
            dd('Error updating product: ',  $error);
        }
    }

    /**
     * Remove the specified product from database.
     * 
     */
    public function destroy($id) {
        try {
            // Get the product by ID
            $product = Product::find($id);

            // If product is not found, return a 404 error response
            if (!$product) {
                dd('Product not found');
            }

            // Delete the product
            $product->delete();

            // Redirect to the products index page
            return redirect()->route('products.index');
        } catch (Throwable $error) {
            // Log the error and return a response with an error message
            dd('Error deleting product: ', $error);
        }
    }

    // DO NOT EDIT BELOW THIS LINE, IT'S FOR TESTING ONLY
    public function seed() {
        try {

            $products = [
                1 => [
                    "name" => "Security Pro Camera",
                    "price" => 149.99,
                    "description" => "High-resolution indoor/outdoor security camera with night vision."
                ],
                2 => [
                    "name" => "SafeHome Alarm System",
                    "price" => 199.99,
                    "description" => "Wireless home alarm system with mobile alerts."
                ],
                3 => [
                    "name" => "Guardian Smoke Detector",
                    "price" => 29.99,
                    "description" => "Smart smoke and carbon monoxide detector with real-time notifications."
                ],
                4 => [
                    "name" => "Vision Doorbell",
                    "price" => 99.99,
                    "description" => "Video doorbell with 1080p HD video and two-way audio."
                ],
                5 => [
                    "name" => "Intruder Alert Sensor",
                    "price" => 49.99,
                    "description" => "Motion sensor with pet-friendly settings and mobile integration."
                ],
                6 => [
                    "name" => "Window Shield",
                    "price" => 39.99,
                    "description" => "Break-in resistant window film with UV protection."
                ],
                7 => [
                    "name" => "Digital Safe",
                    "price" => 89.99,
                    "description" => "Electronic safe with keypad entry and emergency override key."
                ],
                8 => [
                    "name" => "Floodlight Cam",
                    "price" => 129.99,
                    "description" => "Outdoor security camera with built-in floodlights and siren."
                ],
                9 => [
                    "name" => "Smart Lock",
                    "price" => 109.99,
                    "description" => "Keyless entry lock with remote access and activity log."
                ],
                10 => [
                    "name" => "Driveway Monitor",
                    "price" => 59.99,
                    "description" => "Wireless driveway alarm with adjustable range and sensitivity."
                ]
            ];

            foreach ($products as $product) {
                Product::create($product);
            }

            // return the product
            return redirect()->route('products.index');
        } catch (Throwable $error) {
            // catch any errors and return it
            return dd($error);
        }
    }
}

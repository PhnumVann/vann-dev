<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }
    public function store(Request $request)

    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',

            // Add more validation rules as needed
        ]);

        Product::create($validatedData);

        return response()->json([
            'message' => 'Product created successfully'
        ]);
    }
}

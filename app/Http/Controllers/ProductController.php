<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // List all products
    public function index()
    {
        return Product::all();
    }

    // Show a single product
    public function show($id)
    {
        return Product::findOrFail($id);
    }

    // Store a new product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'created_by' => 'required|exists:users,id',
        ]);
        return Product::create($validated);
    }

    // Update an existing product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|string',
            'image' => 'nullable|string',
            'price' => 'sometimes|numeric',
            'stock' => 'sometimes|integer',
            'created_by' => 'sometimes|exists:users,id',
        ]);
        $product->update($validated);
        return $product;
    }

    // Delete a product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['message' => 'Product deleted']);
    }
}

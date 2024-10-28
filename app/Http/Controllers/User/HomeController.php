<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller // Fixed naming convention
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // Example: return a view with products
        $products = Product::all(); // Retrieve all products
        return Inertia::render('user/index',['products'=> $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Example: return view for creating a product
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        Product::create($request->validated());
        return redirect()->route('home.index');
    }

   
    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // Example: return view for a single product
        return view('user.home.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // Example: return view for editing a product
        return view('user.home.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return redirect()->route('home.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete(); // Delete the product
        return redirect()->route('home.index'); // Redirect to index
    }
}

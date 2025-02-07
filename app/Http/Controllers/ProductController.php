<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('products.index', [
            'products' => Product::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0'
        ]);
        Product::create($request->all());
        return redirect()->route('products.index')
                ->withSuccess('New product is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) : View
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found');
        }
        return view('products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) : View
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found');
        }
        return view('products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) 
    {
        // dd($request->all(),$id);
        $product = Product::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0'
        ]);

        $product->update($validated);
        return redirect()->route('products.index')->withSuccess('Product is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) : RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}

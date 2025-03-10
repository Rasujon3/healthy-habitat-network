<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Business;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('business');

        // Filter by product type
        if ($request->has('product_type') && $request->product_type != '') {
            $query->where('product_type', $request->product_type);
        }

        // Filter by price
        if ($request->has('max_price') && is_numeric($request->max_price)) {
            $query->where('price', '<=', $request->max_price);
        }

        // Filter by price category
        if ($request->has('price_category') && $request->price_category != '') {
            $query->where('price_category', $request->price_category);
        }

        $products = $query->paginate(10);

        // Get unique product types for filter dropdown
        $productTypes = Product::distinct()->pluck('product_type');

        return view('products.index', compact('products', 'productTypes'));
    }
    public function create()
    {
        $businesses = Business::where('status', 'active')->pluck('business_name', 'id');
        return view('products.create', compact('businesses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'business_id' => 'required|exists:businesses,id',
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'health_benefits' => 'nullable|string',
            'price_category' => 'required|in:affordable,moderate,premium',
            'product_type' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
        ]);

        // Check if product already exists for this business
        $existingProduct = Product::where('business_id', $request->business_id)
            ->where('product_name', $request->product_name)
            ->first();

        if ($existingProduct) {
            return back()->with('error', 'This product already exists for this business. Each product can only be registered once.');
        }

        Product::create($validated);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->load('business', 'votes.resident');
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $businesses = Business::where('status', 'active')->pluck('business_name', 'id');
        return view('products.edit', compact('product', 'businesses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'business_id' => 'required|exists:businesses,id',
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'health_benefits' => 'nullable|string',
            'price_category' => 'required|in:affordable,moderate,premium',
            'product_type' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'is_available' => 'boolean',
        ]);

        $product->update($validated);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }

    /**
     * Advanced feature: Update availability for all products from a business
     */
    public function batchUpdateAvailability(Request $request)
    {
        $validated = $request->validate([
            'business_id' => 'required|exists:businesses,id',
            'is_available' => 'required|boolean',
        ]);

        Product::where('business_id', $request->business_id)
            ->update(['is_available' => $request->is_available]);

        return back()->with('success', 'Product availability updated successfully');
    }
}

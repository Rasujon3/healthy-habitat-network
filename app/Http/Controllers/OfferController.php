<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::leftJoin('products', 'offers.product_id', '=', 'products.id')
            ->select('offers.*', 'products.product_name as product_name')
            ->get();

        return view('offers.index', compact('offers'));
    }
    public function create()
    {
        $products = Product::leftJoin('offers', 'products.id', '=', 'offers.product_id')
            ->whereNull('offers.id')  // This ensures the product doesn't exist in offers table
            ->where('products.is_available', '1')  // Be explicit about which table's column
            ->select('products.id', 'products.product_name')  // Select the fields you need
            ->pluck('product_name', 'id');  // Now pluck with correct column names

        return view('offers.create', compact('products'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'offer_description' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = empty($validated['is_active']) ? 0 : 1;

        Offer::create($validated);

        return redirect()->route('offers.index')->with('success', 'Offer created successfully.');
    }
    public function show($id)
    {
        $offer = Offer::leftJoin('products', 'offers.product_id', '=', 'products.id')
            ->where('offers.id', $id)
            ->select('offers.*', 'products.product_name as product_name')
            ->first();
        return view('offers.show', compact('offer'));
    }
    public function edit(Offer $offer)
    {
        $products = Product::leftJoin('offers', 'offers.product_id', '=', 'products.id')
            ->where('products.is_available', 1)
            ->where(function ($query) use ($offer) {
                $query->whereNull('offers.product_id')
                    ->orWhere('products.id', $offer->product_id);
            })
            ->pluck('product_name', 'products.id');

        return view('offers.edit', compact('offer', 'products'));
    }
    public function update(Request $request, Offer $offer)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'offer_description' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = empty($validated['is_active']) ? 0 : 1;

        $offer->update($validated);

        return redirect()->route('offers.index')->with('success', 'Offer updated successfully');
    }
    public function destroy(Offer $offer)
    {
        $offer->delete();

        return redirect()->route('offers.index')
            ->with('success', 'Offer deleted successfully');
    }
}

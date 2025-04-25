<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::with('business');

        // Search by keyword (product name)
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by product type
        if ($request->has('delivery_mode') && $request->product_type != '') {
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

        // Filter by Delivery Mode
        if ($request->has('delivery_mode') && $request->delivery_mode != '') {
            $query->where('delivery_mode', $request->delivery_mode);
        }

        $products = $query->paginate(10)->withQueryString(); // withQueryString preserves the filter parameters in pagination links

        return view('services.index', compact('products'));
    }
    public function create()
    {
        $businesses = Business::where('status', 'active')->pluck('business_name', 'id');
        return view('services.create', compact('businesses'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'business_id' => 'required|exists:businesses,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'health_benefits' => 'nullable|string',
            'price_category' => 'required|in:affordable,moderate,premium',
            'certifications' => 'required|string|max:255',
            'delivery_mode' => 'required|in:online,in-person,hybrid',
            'service_duration' => 'required|string|max:255',
            'is_available' => 'boolean',
        ]);

        // Check if service already exists for this business
        $existingProduct = Service::where('business_id', $request->business_id)
            ->where('name', $request->name)
            ->first();

        if ($existingProduct) {
            return back()->with('error', 'This service already exists for this business. Each product can only be registered once.');
        }

        $validated['is_available'] = empty($validated['is_available']) ? 0 : 1;

        Service::create($validated);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }
    public function show(Service $service)
    {
        $service->load('business', 'votes.resident');
        return view('services.show', compact('service'));
    }
    public function edit(Service $service)
    {
        $businesses = Business::where('status', 'active')->pluck('business_name', 'id');
        return view('services.edit', compact('service', 'businesses'));
    }
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'business_id' => 'required|exists:businesses,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'health_benefits' => 'nullable|string',
            'price_category' => 'required|in:affordable,moderate,premium',
            'certifications' => 'required|string|max:255',
            'delivery_mode' => 'required|in:online,in-person,hybrid',
            'service_duration' => 'required|string|max:255',
            'is_available' => 'boolean',
        ]);

        $validated['is_available'] = empty($validated['is_available']) ? 0 : 1;

        $service->update($validated);

        return redirect()->route('services.index')
            ->with('success', 'Service updated successfully');
    }
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')
            ->with('success', 'Service deleted successfully');
    }
}

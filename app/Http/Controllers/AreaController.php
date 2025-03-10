<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $areas = Area::all();
        return view('areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('areas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'area_name' => 'required|string|max:255|unique:areas',
            'description' => 'nullable|string',
            'council_contact' => 'nullable|string|max:255',
        ]);

        Area::create($validated);

        return redirect()->route('areas.index')
            ->with('success', 'Area created successfully.');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Area $area)
    {
        return view('areas.show', compact('area'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Area $area)
    {
        return view('areas.edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Area $area)
    {
        $validated = $request->validate([
            'area_name' => 'required|string|max:255|unique:areas,area_name,' . $area->id,
            'description' => 'nullable|string',
            'council_contact' => 'nullable|string|max:255',
        ]);

        $area->update($validated);

        return redirect()->route('areas.index')
            ->with('success', 'Area updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Area $area)
    {
        $area->delete();

        return redirect()->route('areas.index')
            ->with('success', 'Area deleted successfully');
    }
}

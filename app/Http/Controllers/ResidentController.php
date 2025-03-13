<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Resident;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retrieve areas and users for the form
        $areas = Area::all();
        $users = User::all();

        return view('residents.create', compact('areas', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'area_id' => 'required|exists:areas,id',
            'name' => 'required|string|max:255',
            'age_group' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'interest_areas' => 'required|array',
        ]);

        // Create the new resident
        Resident::create([
            'user_id' => $request->user_id,
            'area_id' => $request->area_id,
            'name' => $request->name,
            'age_group' => $request->age_group,
            'gender' => $request->gender,
            'interest_areas' => json_encode($request->interest_areas), // Store as JSON
            'email' => Auth::user()->email,
        ]);

        // Redirect or return response
        return redirect()->route('products.index')->with('success', 'Resident created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find the resident and the areas
        $resident = Resident::findOrFail($id);
        $areas = Area::all();
        $users = User::all();

        return view('residents.edit', compact('resident', 'areas', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'area_id' => 'required|exists:areas,id',
            'name' => 'required|string|max:255',
            'age_group' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'interest_areas' => 'required|array',
        ]);

        // Find the resident
        $resident = Resident::findOrFail($id);

        // Update the resident data
        $resident->update([
            'user_id' => $request->user_id,
            'area_id' => $request->area_id,
            'name' => $request->name,
            'age_group' => $request->age_group,
            'gender' => $request->gender,
            'interest_areas' => json_encode($request->interest_areas), // Store as JSON
        ]);

        // Redirect or return response
        return redirect()->route('resident.edit', $resident->id)->with('success', 'Resident updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

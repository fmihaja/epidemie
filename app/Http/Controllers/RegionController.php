<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Disease;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = Region::with('diseases')->get();

        return response()->json([
            'regions' => $regions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(['message' => 'Form to create new region']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'population' => 'nullable|integer|min:0',
            'latitude' => 'nullable|string',
            'longitude' => 'nullable|integer',
        ]);

        $region = Region::create($request->all());

        return response()->json([
            'message' => 'Région ajoutée avec succès.',
            'data' => $region
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Region $region)
    {
        return response()->json($region);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Region $region)
    {
        return response()->json(['message' => 'Form to edit region', 'data' => $region]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Region $region)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'population' => 'nullable|integer|min:0',
            'latitude' => 'nullable|string',
            'longitude' => 'nullable|integer',
        ]);

        $region->update($request->all());

        return response()->json([
            'message' => 'Région mise à jour avec succès.',
            'data' => $region
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region)
    {
        $region->delete();
        return response()->json([
            'message' => 'Région supprimée avec succès.'
        ]);
    }
}

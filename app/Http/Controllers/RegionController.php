<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\desease;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = Region::orderBy('name')->paginate(10);
        $diseases =Disease::all();
        return view('regions.index', compact('regions', 'diseases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('regions.create');
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

        Region::create($request->all());

        return redirect()->route('regions.index')->with('success', 'Région ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Region $region)
    {
        return view('regions.show', compact('region'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Region $region)
    {
        return view('regions.edit', compact('region'));
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

        return redirect()->route('regions.index')->with('success', 'Région mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region)
    {
        $region->delete();
        return redirect()->route('regions.index')->with('success', 'Région supprimée avec succès.');
    }
}

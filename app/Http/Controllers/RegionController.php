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
<<<<<<< HEAD
        $regions = Region::orderBy('name')->paginate(10);
        $diseases =Disease::all();
        return view('regions.index', compact('regions', 'diseases'));
=======
        $regions = Region::with('diseases')->get();

        return response()->json([
            'regions' => $regions
        ]);
>>>>>>> main
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
<<<<<<< HEAD
        return view('regions.create');
=======
        return response()->json(['message' => 'Form to create new region']);
>>>>>>> main
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

<<<<<<< HEAD
        Region::create($request->all());

        return redirect()->route('regions.index')->with('success', 'Région ajoutée avec succès.');
=======
        $region = Region::create($request->all());

        return response()->json([
            'message' => 'Région ajoutée avec succès.',
            'data' => $region
        ]);
>>>>>>> main
    }

    /**
     * Display the specified resource.
     */
    public function show(Region $region)
    {
<<<<<<< HEAD
        return view('regions.show', compact('region'));
=======
        return response()->json($region);
>>>>>>> main
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Region $region)
    {
<<<<<<< HEAD
        return view('regions.edit', compact('region'));
=======
        return response()->json(['message' => 'Form to edit region', 'data' => $region]);
>>>>>>> main
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

<<<<<<< HEAD
        return redirect()->route('regions.index')->with('success', 'Région mise à jour avec succès.');
=======
        return response()->json([
            'message' => 'Région mise à jour avec succès.',
            'data' => $region
        ]);
>>>>>>> main
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region)
    {
        $region->delete();
<<<<<<< HEAD
        return redirect()->route('regions.index')->with('success', 'Région supprimée avec succès.');
=======
        return response()->json([
            'message' => 'Région supprimée avec succès.'
        ]);
>>>>>>> main
    }
}

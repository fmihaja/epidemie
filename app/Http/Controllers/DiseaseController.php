<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diseases = Disease::with('regions')->get();
        return response()->json([
            'status' => 'success',
            'data' => $diseases
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'pathogene' => 'required|string|max:255',
            'transmissions' => 'required|string',
            'incubation' => 'required|string|max:255',
            'regions' => 'nullable|array',
            'regions.*' => 'exists:regions,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $disease = Disease::create($request->only(['name', 'pathogene', 'transmissions', 'incubation']));

        if ($request->has('regions')) {
            $disease->regions()->attach($request->regions);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Disease created successfully',
            'data' => $disease->load('regions')
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Disease $disease)
    {
        return response()->json([
            'status' => 'success',
            'data' => $disease->load('regions')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Disease $disease)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'pathogene' => 'sometimes|required|string|max:255',
            'transmissions' => 'sometimes|required|string',
            'incubation' => 'sometimes|required|string|max:255',
            'regions' => 'nullable|array',
            'regions.*' => 'exists:regions,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $disease->update($request->only(['name', 'pathogene', 'transmissions', 'incubation']));

        if ($request->has('regions')) {
            $disease->regions()->sync($request->regions);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Disease updated successfully',
            'data' => $disease->load('regions')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disease $disease)
    {
        $disease->regions()->detach();
        $disease->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Disease deleted successfully'
        ]);
    }
}
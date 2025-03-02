<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = Region::with('diseases')->get();
        return response()->json([
            'message' => 'success',
            'data' => $regions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'lat' => 'required|numeric',
            'long' => 'required|numeric',
            'population' => 'required|integer|min:0',
            'diseases' => 'nullable|array',
            'diseases.*' => 'exists:diseases,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $region = Region::create($request->only(['name', 'lat', 'long', 'population']));

        if ($request->has('diseases')) {
            $region->diseases()->attach($request->diseases);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Region created successfully',
            'data' => $region->load('diseases')
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Region $region)
    {
        return response()->json([
            'message' => 'success',
            'data' => $region->load('diseases')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Region $region)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'lat' => 'sometimes|required|numeric',
            'long' => 'sometimes|required|numeric',
            'population' => 'sometimes|required|integer|min:0',
            'diseases' => 'nullable|array',
            'diseases.*' => 'exists:diseases,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $region->update($request->only(['name', 'lat', 'long', 'population']));

        if ($request->has('diseases')) {
            $region->diseases()->sync($request->diseases);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Region updated successfully',
            'data' => $region->load('diseases')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region)
    {
        $region->diseases()->detach();
        $region->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Region deleted successfully'
        ]);
    }
}
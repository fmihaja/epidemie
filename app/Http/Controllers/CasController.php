<?php

namespace App\Http\Controllers;

use App\Models\Cas;
use App\Models\Patient;
use App\Models\Disease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cases = Cas::with(['patient', 'disease'])->get();
        return response()->json([
            'status' => 'success',
            'data' => $cases
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'dateDiagnosis' => 'required|date',
            'status' => 'required|string|max:255',
            'symptomes' => 'required|string',
            'patient_id' => 'required|exists:patients,id',
            'disease_id' => 'required|exists:diseases,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $cas = Cas::create($request->only([
            'dateDiagnosis', 'status', 'symptomes', 'patient_id', 'disease_id'
        ]));

        return response()->json([
            'status' => 'success',
            'message' => 'Case created successfully',
            'data' => $cas->load(['patient', 'disease'])
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cas $cas)
    {
        return response()->json([
            'status' => 'success',
            'data' => $cas->load(['patient', 'disease'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cas $cas)
    {
        $validator = Validator::make($request->all(), [
            'dateDiagnosis' => 'sometimes|required|date',
            'status' => 'sometimes|required|string|max:255',
            'symptomes' => 'sometimes|required|string',
            'patient_id' => 'sometimes|required|exists:patients,id',
            'disease_id' => 'sometimes|required|exists:diseases,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $cas->update($request->only([
            'dateDiagnosis', 'status', 'symptomes', 'patient_id', 'disease_id'
        ]));

        return response()->json([
            'status' => 'success',
            'message' => 'Case updated successfully',
            'data' => $cas->load(['patient', 'disease'])
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cas $cas)
    {
        $cas->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Case deleted successfully'
        ]);
    }
}
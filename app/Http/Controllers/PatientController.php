<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::with('cas')->get();
        return response()->json([
            'status' => 'success',
            'data' => $patients
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'firstName' => 'required|string|max:255',
            'birthDate' => 'required|date',
            'email' => 'required|email|max:255|unique:patients',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $patient = Patient::create($request->only(['name', 'firstName', 'birthDate', 'email']));

        return response()->json([
            'status' => 'success',
            'message' => 'Patient created successfully',
            'data' => $patient
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return response()->json([
            'status' => 'success',
            'data' => $patient->load('cas')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'firstName' => 'sometimes|required|string|max:255',
            'birthDate' => 'sometimes|required|date',
            'email' => 'sometimes|required|email|max:255|unique:patients,email,' . $patient->id,
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $patient->update($request->only(['name', 'firstName', 'birthDate', 'email']));

        return response()->json([
            'status' => 'success',
            'message' => 'Patient updated successfully',
            'data' => $patient
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Patient deleted successfully'
        ]);
    }
}
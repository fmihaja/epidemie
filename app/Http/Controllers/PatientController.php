<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Patient::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'birthDate' => 'required|date',
            'gender' => 'required|string|max:10',
        ]);

        $patient = Patient::create($validatedData);
        return response()->json($patient, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
        return response()->json($patient->load('casesPatients'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        //
        $validatedData = $request->validate([
            'firstName' => 'sometimes|string|max:255',
            'name' => 'sometimes|string|max:255',
            'birthDate' => 'sometimes|date',
            'gender' => 'sometimes|string|max:10',
        ]);

        $patient->update($validatedData);
        return response()->json($patient);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
        $patient->delete();
        return response()->json(['message' => 'Patient deleted successfully']);
    }
}

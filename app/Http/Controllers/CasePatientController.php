<?php

namespace App\Http\Controllers;

use App\Models\CasePatient;
use Illuminate\Http\Request;

class CasePatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(CasePatient::with('patients')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'diagnosis_date' => 'required|date',
            'status' => 'required|in:suspecté,confirmé,guéri',
            'patient_id' => 'required|exists:patients,id',
        ]);

        $casePatient = CasePatient::create($validatedData);

        return response()->json($casePatient, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CasePatient $casePatient)
    {
        return response()->json($casePatient->load('patients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CasePatient $casePatient)
    {
        $validatedData = $request->validate([
            'diagnosis_date' => 'sometimes|date',
            'status' => 'sometimes|in:suspecté,confirmé,guéri',
            'patient_id' => 'sometimes|exists:patients,id',
        ]);

        $casePatient->update($validatedData);

        return response()->json($casePatient);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CasePatient $casePatient)
    {
        $casePatient->delete();

        return response()->json(['message' => 'Case deleted successfully']);
    }
}

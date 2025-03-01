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
        $cases = CasePatient::orderBy('diagnosis_date', 'desc')->paginate(10);
        return view('case_patients.index', compact('cases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('case_patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'diagnosis_date' => 'required|date',
            'status' => 'required|in:suspecté,confirmé,guéri',
        ]);

        CasePatient::create($request->all());

        return redirect()->route('case_patients.index')->with('success', 'Cas patient ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CasePatient $casePatient)
    {
        return view('case_patients.show', compact('casePatient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CasePatient $casePatient)
    {
        return view('case_patients.edit', compact('casePatient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CasePatient $casePatient)
    {
        $request->validate([
            'diagnosis_date' => 'required|date',
            'status' => 'required|in:suspecté,confirmé,guéri',
        ]);

        $casePatient->update($request->all());

        return redirect()->route('case_patients.index')->with('success', 'Cas patient mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CasePatient $casePatient)
    {
        $casePatient->delete();
        return redirect()->route('case_patients.index')->with('success', 'Cas patient supprimé avec succès.');
    }
}

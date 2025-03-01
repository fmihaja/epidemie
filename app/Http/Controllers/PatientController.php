<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::paginate(10);
        return view('patients.index', compact('patients'));
    }

    /**
     * Afficher le formulaire de création d'un patient.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Enregistrer un nouveau patient.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'birthDate' => 'required|date',
            'gender' => 'required|string|in:Homme,Femme,Autre',
        ]);

        Patient::create($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient ajouté avec succès.');
    }

    /**
     * Afficher les détails d'un patient.
     */
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    /**
     * Afficher le formulaire d'édition d'un patient.
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Mettre à jour un patient.
     */
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'birthDate' => 'required|date',
            'gender' => 'required|string|in:Homme,Femme,Autre',
        ]);

        $patient->update($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient mis à jour avec succès.');
    }

    /**
     * Supprimer un patient.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient supprimé avec succès.');
    }
}

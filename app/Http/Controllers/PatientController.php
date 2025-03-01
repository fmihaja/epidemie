<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Cloudstudio\Ollama\Facades\Ollama;


class PatientController extends Controller
{

    /**
     * Afficher la liste des patients avec pagination au format JSON.
     */
    public function index()
    {
        /* $patients = Patient::all();
        return response()->json($patients); */
        return Ollama::agent('You are a weather expert...')
            ->prompt('Why is the sky blue?')
            ->model('llama2')
            ->options(['temperature' => 0.8])
            ->stream(false)
            ->ask();
    }

    /**
     * Afficher le formulaire de création d'un patient (si nécessaire pour votre application web).
     */
    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'name' => 'string|max:255',
            'birthDate' => 'required|date',
            'gender' => 'required|string|in:Homme,Femme,Autre',
        ]);


        $patient = Patient::create($request->all());

        // Retourner un format JSON avec le patient créé
        return response()->json([
            'message' => 'Patient ajouté avec succès.',
            'patient' => $patient
        ], 201);  // Code HTTP 201 signifie "créé"
    }

    /**
     * Afficher les détails d'un patient (au format JSON).
     */
    public function show(Patient $patient)
    {
        return response()->json($patient);

    }

    /**
     * Afficher le formulaire d'édition d'un patient.
     */
    public function edit(Patient $patient)
    {
        return response()->json(['message' => 'Form to edit new patient']);
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'birthDate' => 'required|date',
            'gender' => 'required|string|in:Homme,Femme,Autre',
        ]);

        $patient->update($request->all());

        // Retourner une réponse JSON indiquant que le patient a été mis à jour
        return response()->json([
            'message' => 'Patient mis à jour avec succès.',
            'patient' => $patient
        ]);
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();


        // Retourner une réponse JSON avec un message de succès
        return response()->json([
            'message' => 'Patient supprimé avec succès.'
        ]);
    }
}

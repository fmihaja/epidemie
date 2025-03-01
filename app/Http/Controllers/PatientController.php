<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
<<<<<<< HEAD
    public function index()
    {
        $patients = Patient::paginate(10);
        return view('patients.index', compact('patients'));
    }

    /**
     * Afficher le formulaire de création d'un patient.
=======
    /**
     * Afficher la liste des patients avec pagination au format JSON.
     */
    public function index()
    {
        $patients = Patient::all();  // Vous pouvez ajuster la pagination si nécessaire
        return response()->json($patients);
    }

    /**
     * Afficher le formulaire de création d'un patient (si nécessaire pour votre application web).
>>>>>>> main
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
<<<<<<< HEAD
     * Enregistrer un nouveau patient.
=======
     * Enregistrer un nouveau patient (retourner un format JSON pour l'API).
>>>>>>> main
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'birthDate' => 'required|date',
            'gender' => 'required|string|in:Homme,Femme,Autre',
        ]);

<<<<<<< HEAD
        Patient::create($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient ajouté avec succès.');
    }

    /**
     * Afficher les détails d'un patient.
     */
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
=======
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
>>>>>>> main
    }

    /**
     * Afficher le formulaire d'édition d'un patient.
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
<<<<<<< HEAD
     * Mettre à jour un patient.
=======
     * Mettre à jour un patient (retourner un format JSON).
>>>>>>> main
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

<<<<<<< HEAD
        return redirect()->route('patients.index')->with('success', 'Patient mis à jour avec succès.');
    }

    /**
     * Supprimer un patient.
=======
        // Retourner une réponse JSON indiquant que le patient a été mis à jour
        return response()->json([
            'message' => 'Patient mis à jour avec succès.',
            'patient' => $patient
        ]);
    }

    /**
     * Supprimer un patient (retourner un format JSON).
>>>>>>> main
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
<<<<<<< HEAD
        return redirect()->route('patients.index')->with('success', 'Patient supprimé avec succès.');
=======

        // Retourner une réponse JSON avec un message de succès
        return response()->json([
            'message' => 'Patient supprimé avec succès.'
        ]);
>>>>>>> main
    }
}

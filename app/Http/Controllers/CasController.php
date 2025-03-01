<?php

namespace App\Http\Controllers;

use App\Models\Cas;
use App\Models\Patient;
use App\Models\Disease;
use Illuminate\Http\Request;
use Validator;

class CaseController extends Controller
{
    // Afficher la liste de tous les cas
    public function index()
    {
        $cases = Cas::with(['patient', 'disease'])->get(); // Charger les relations patient et maladie
        return response()->json($cases);
    }

    // Afficher un cas spécifique
    public function show($id)
    {
        $case = Cas::with(['patient', 'disease'])->find($id);

        if (!$case) {
            return response()->json(['error' => 'Case not found'], 404);
        }

        return response()->json($case);
    }

    // Créer un nouveau cas
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_id' => 'required|exists:patients,id',
            'disease_id' => 'required|exists:diseases,id',
            'dateDiagnosis' => 'required|date',
            'status' => 'required|in:confirmé,suspects,rétablie,normal',
            'symptomes' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $case = Cas::create([
            'patient_id' => $request->patient_id,
            'disease_id' => $request->disease_id,
            'dateDiagnosis' => $request->dateDiagnosis,
            'status' => $request->status,
            'symptomes' => $request->symptomes,
        ]);

        return response()->json($case, 201);
    }

    // Mettre à jour un cas existant
    public function update(Request $request, $id)
    {
        $case = Cas::find($id);

        if (!$case) {
            return response()->json(['error' => 'Case not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'patient_id' => 'exists:patients,id',
            'disease_id' => 'exists:diseases,id',
            'dateDiagnosis' => 'date',
            'status' => 'in:confirmé,suspects,rétablie,normal',
            'symptomes' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $case->update($request->only('patient_id', 'disease_id', 'dateDiagnosis', 'status', 'symptomes'));

        return response()->json($case);
    }

    // Supprimer un cas
    public function destroy($id)
    {
        $case = Cas::find($id);

        if (!$case) {
            return response()->json(['error' => 'Case not found'], 404);
        }

        $case->delete();

        return response()->json(['message' => 'Case deleted successfully']);
    }
}

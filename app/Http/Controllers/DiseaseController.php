<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disease;
use Validator;

class DiseaseController extends Controller
{
    // Afficher la liste des maladies
    public function index()
    {
        $diseases = Disease::all();
        return response()->json($diseases);
    }

    // Afficher une maladie spécifique
    public function show($id)
    {
        $disease = Disease::find($id);

        if (!$disease) {
            return response()->json(['error' => 'Maladie introuvalble'], 404);
        }

        return response()->json($disease);
    }

    // Créer une nouvelle maladie
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'pathogene' => 'required|string',
            'transmissions' => 'required|in:direct,indirect',
            'incubation' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $disease = Disease::create([
            'name' => $request->name,
            'pathogene' => $request->pathogene,
            'transmissions' => $request->transmissions,
            'incubation' => $request->incubation,
        ]);

        return response()->json($disease, 201);
    }

    // Mettre à jour une maladie existante
    public function update(Request $request, $id)
    {
        $disease = Disease::find($id);

        if (!$disease) {
            return response()->json(['error' => 'Disease not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'pathogene' => 'string',
            'transmissions' => 'in:direct,indirect',
            'incubation' => 'integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $disease->update($request->only('name', 'pathogene', 'transmissions', 'incubation'));

        return response()->json($disease);
    }

    // Supprimer une maladie
    public function destroy($id)
    {
        $disease = Disease::find($id);

        if (!$disease) {
            return response()->json(['error' => 'Disease not found'], 404);
        }

        $disease->delete();

        return response()->json(['message' => 'Disease deleted successfully']);
    }
}

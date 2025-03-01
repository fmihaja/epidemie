<?php
namespace App\Http\Controllers;

use App\Models\DiseaseRegion;
use App\Models\Disease;
use App\Models\Region;
use Illuminate\Http\Request;

class DiseaseRegionController extends Controller
{
    /**
     * Afficher la liste des maladies associées aux régions au format JSON.
     */
    public function index()
    {
        $diseaseRegions = DiseaseRegion::with(['disease', 'region'])->paginate(10);
        return response()->json($diseaseRegions);
    }

    /**
     * Afficher le formulaire de création (pour une interface web).
     */
    public function create()
    {
        $diseases = Disease::all();
        $regions = Region::all();
        return view('disease_regions.create', compact('diseases', 'regions'));
    }

    /**
     * Enregistrer une nouvelle association maladie-région (retour au format JSON).
     */
    public function store(Request $request)
    {
        $request->validate([
            'region_id' => 'required|exists:regions,id',
            'disease_id' => 'required|exists:diseases,id',
        ]);

        $diseaseRegion = DiseaseRegion::create($request->all());

        // Retourner la réponse JSON avec l'association créée
        return response()->json([
            'message' => 'Association ajoutée avec succès.',
            'diseaseRegion' => $diseaseRegion
        ], 201);  // Code HTTP 201 pour "créé"
    }

    /**
     * Afficher les détails d'une association maladie-région (retour en JSON).
     */
    public function show(DiseaseRegion $diseaseRegion)
    {
        return response()->json($diseaseRegion);
    }

    /**
     * Afficher le formulaire d'édition (pour une interface web).
     */
    public function edit(DiseaseRegion $diseaseRegion)
    {
        $diseases = Disease::all();
        $regions = Region::all();
        return view('disease_regions.edit', compact('diseaseRegion', 'diseases', 'regions'));
    }

    /**
     * Mettre à jour une association maladie-région (retour en JSON).
     */
    public function update(Request $request, DiseaseRegion $diseaseRegion)
    {
        $request->validate([
            'region_id' => 'required|exists:regions,id',
            'disease_id' => 'required|exists:diseases,id',
        ]);

        $diseaseRegion->update($request->all());

        // Retourner la réponse JSON avec l'association mise à jour
        return response()->json([
            'message' => 'Association mise à jour avec succès.',
            'diseaseRegion' => $diseaseRegion
        ]);
    }

    /**
     * Supprimer une association maladie-région (retour en JSON).
     */
    public function destroy(DiseaseRegion $diseaseRegion)
    {
        $diseaseRegion->delete();

        // Retourner une réponse JSON après la suppression
        return response()->json([
            'message' => 'Association supprimée avec succès.'
        ]);
    }
}

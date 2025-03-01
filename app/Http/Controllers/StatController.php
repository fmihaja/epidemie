<?php

namespace App\Http\Controllers;



use App\Models\Cas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalCas = Cas::count();

        // Nombre de cas par statut
        $casParStatus = Cas::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();

        // Nombre de cas par maladie
        $casParMaladie = Cas::join('diseases', 'cas.disease_id', '=', 'diseases.id')
            ->select('diseases.name as disease_name', DB::raw('count(*) as total'))
            ->groupBy('diseases.name')
            ->get();

        // Retourner les résultats en format JSON
        return response()->json([
            'total_cas' => $totalCas,
            'cases_by_status' => $casParStatus,
            'cases_by_disease' => $casParMaladie
        ]);
    }

}

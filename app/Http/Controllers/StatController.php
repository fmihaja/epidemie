<?php

namespace App\Http\Controllers;

use App\Models\Cas;
use App\Models\Disease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatController extends Controller
{
    /**
     * Get statistics of cases grouped by disease and status
     * with patient count
     */
    public function diseaseStatusStats()
    {
        $stats = Cas::select('diseases.name as disease_name', 'cas.status', DB::raw('count(distinct cas.patient_id) as patient_count'))
            ->join('diseases', 'diseases.id', '=', 'cas.disease_id')
            ->groupBy('diseases.name', 'cas.status')
            ->get();

        return response()->json([
            'message' => 'success',
            'data' => $stats
        ]);
    }

    /**
     * Get detailed statistics for a specific disease
     */
    public function diseaseStats($diseaseId)
    {
        $disease = Disease::findOrFail($diseaseId);
        
        $stats = Cas::select('status', DB::raw('count(distinct patient_id) as patient_count'))
            ->where('disease_id', $diseaseId)
            ->groupBy('status')
            ->get();
            
        return response()->json([
            'message' => 'success',
            'disease' => $disease->name,
            'data' => $stats
        ]);
    }

    /**
     * Get statistics of active cases by region
     */
    public function regionStats()
    {
        $stats = DB::table('regions')
            ->select(
                'regions.name as region_name',
                'regions.population',
                'regions.long',
                'regions.lat',
                'diseases.name as disease_name',
                'cas.status',
                DB::raw('COUNT(DISTINCT cas.patient_id) as cases'),
                DB::raw('MAX("cas"."dateDiagnosis") as date_diagnostique'),
            )
            ->join('disease_region', 'regions.id', '=', 'disease_region.region_id')
            ->join('diseases', 'diseases.id', '=', 'disease_region.disease_id')
            ->join('cas', 'diseases.id', '=', 'cas.disease_id')
            // ->where('cas.status', '!=', 'recovered')
            ->groupBy('regions.id', 'diseases.id', 'cas.status')
            ->get();
                
        return response()->json([
            'message' => 'success',
            'data' => $stats
        ]);
    }
    
    
    /**
     * Get global disease statistics
     */
    public function globalStats()
    {
        $totalCases = Cas::count();
        $totalPatients = DB::table('patients')->count();
        $totalDiseases = Disease::count();
        
        $casesByStatus = Cas::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get();
            
        $topDiseases = Cas::select('diseases.name', DB::raw('count(*) as count'))
            ->join('diseases', 'diseases.id', '=', 'cas.disease_id')
            ->groupBy('diseases.name')
            ->orderBy('count', 'desc')
            ->limit(5)
            ->get();
            
        return response()->json([
            'status' => 'success',
            'data' => [
                'total_cases' => $totalCases,
                'total_patients' => $totalPatients,
                'total_diseases' => $totalDiseases,
                'cases_by_status' => $casesByStatus,
                'top_diseases' => $topDiseases
            ]
        ]);
    }
}
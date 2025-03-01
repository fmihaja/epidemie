<?php

namespace Database\Seeders;
use App\Models\CasePatient;
use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CasePatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $patientCount = Patient::count();
        
        if ($patientCount === 0) {
            // Si aucun patient n'existe, en créer quelques-uns
            Patient::factory(20)->create();
        }
        
        // Récupère tous les patients
        $patients = Patient::all();
        
        // Crée 50 cas patients
        CasePatient::factory()->count(50)->create()->each(function ($casePatient) use ($patients) {
            // Attache 1 à 3 patients aléatoires à chaque cas
            $randomPatients = $patients->random(rand(1, 3));
            $casePatient->patients()->attach($randomPatients->pluck('id')->toArray());
        });
    }
}

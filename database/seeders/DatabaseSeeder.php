<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;
use App\Models\Cas;
use App\Models\Disease;
use App\Models\Region;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Seed des régions depuis le JSON
        $this->call([
            RegionSeeder::class, // Charge les 23 régions prédéfinies
            DiseaseSeeder::class // Charge les 23 régions prédéfinies
            
        ]);

        // 2. Créer des maladies
        // $diseases = Disease::factory(10)->create();

        // 3. Associer les maladies aux régions existantes
        $allRegions = Region::all(); // Récupère toutes les régions du seeder
        $diseases=Disease::all();
        foreach ($diseases as $disease) {
            $disease->regions()->attach(
                $allRegions->random(rand(1, 23))->pluck('id')->toArray() // Associe 1 à 5 régions aléatoires
            );
        }

        // 4. Créer des patients
        $patients = Patient::factory(550)->create();

        // 5. Créer des cas pour chaque patient
        foreach ($patients as $patient) {
            Cas::factory(rand(200, 300))->create([
                'patient_id' => $patient->id,
                'disease_id' => $diseases->random()->id,
            ]);
        }
    }
}
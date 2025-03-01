<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patient;
use App\Models\Cas;
use App\Models\Disease;
use App\Models\Region;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call([
        //     PatientSeeder::class, // Si vous avez des patients
        //     CasePatientSeeder::class,
        // ]);
        $regions = Region::factory(5)->create();

        // Créer des maladies
        $diseases = Disease::factory(3)->create();

        // Associer les maladies aux régions (relation many-to-many)
        foreach ($diseases as $disease) {
            $disease->regions()->attach(
                $regions->random(rand(1, 3))->pluck('id')->toArray()
            );
        }

        // Créer des patients
        $patients = Patient::factory(50)->create();

        // Créer des cas pour chaque patient
        foreach ($patients as $patient) {
            Cas::factory(rand(1, 3))->create([
                'patient_id' => $patient->id,
                'disease_id' => $diseases->random()->id,
            ]);
        }
    }
}

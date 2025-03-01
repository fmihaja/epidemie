<?php

namespace Database\Seeders;
use App\Models\CasePatient;
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
        CasePatient::factory()->count(50)->create();
    }
}

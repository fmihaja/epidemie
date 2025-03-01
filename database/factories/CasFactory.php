<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cas;

class CasFactory extends Factory
{
    protected $model = Cas::class;

    public function definition(): array
    {
        return [
            'dateDiagnosis' => $this->faker->date(),
            'status' => $this->faker->randomElement(['confirmé', 'suspects', 'rétablie', 'normal']),
            'symptomes' => $this->faker->sentence(),
            'patient_id' => null, // Défini dynamiquement dans le seeder
            'disease_id' => null, // Défini dynamiquement dans le seeder
        ];
    }
}
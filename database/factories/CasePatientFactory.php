<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CasePatientFactory extends Factory
{
    public function definition(): array
    {
        return [
            'diagnosis_date' => $this->faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
            'status' => $this->faker->randomElement([
                'suspecté',
                'confirmé', 
                'guéri'
            ])
        ];
    }
}
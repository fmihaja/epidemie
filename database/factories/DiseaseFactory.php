<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Disease;

class DiseaseFactory extends Factory
{
    protected $model = Disease::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'pathogene' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'transmissions' => $this->faker->randomElement(['direct', 'indirect']),
            'incubation' => $this->faker->numberBetween(1, 14),
        ];
    }
}
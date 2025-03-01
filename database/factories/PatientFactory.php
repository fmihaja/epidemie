<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Patient;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Patient::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->lastName(),
            'firstName' => $this->faker->firstName(),
            'birthDate' => $this->faker->date(),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}

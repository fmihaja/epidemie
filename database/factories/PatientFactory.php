<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        return [
            'firstName' => $this->faker->firstName(),
            'name' => $this->faker->lastName(),
            'birthDate' => $this->faker->dateTimeBetween('-80 years', '-18 years')->format('Y-m-d'),
            'gender' => $this->faker->randomElement(['M', 'F']),
            // 'phone' => $this->faker->unique()->phoneNumber(),

        ];
    }
}

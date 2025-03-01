<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Region;

class RegionFactory extends Factory
{
    protected $model = Region::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->city(),
            'lat' => $this->faker->latitude(),
            'long' => $this->faker->longitude(),
            'population' => $this->faker->numberBetween(1000, 1000000),
        ];
    }
}
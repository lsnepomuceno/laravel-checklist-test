<?php

namespace Database\Factories;

use App\Models\Cake;
use Illuminate\Database\Eloquent\Factories\Factory;

class CakeFactory extends Factory
{
    protected $model = Cake::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'weight' => round($this->faker->randomFloat(max: 10000), 2),
            'value' => round($this->faker->randomFloat(max: 10000), 2),
            'amount' => $this->faker->numberBetween(int2: 10000)
        ];
    }
}

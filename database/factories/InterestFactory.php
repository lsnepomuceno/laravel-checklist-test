<?php

namespace Database\Factories;

use App\Models\{Cake, Interest};
use Illuminate\Database\Eloquent\Factories\Factory;

class InterestFactory extends Factory
{
    protected $model = Interest::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'cake_id' => Cake::factory()
        ];
    }
}

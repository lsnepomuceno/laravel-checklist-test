<?php

namespace Tests\Feature;

use App\Models\Cake;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CakeTest extends TestCase
{
    use RefreshDatabase;

    public function test_successfully_creating_cake_records_using_factory()
    {
        $cakes = Cake::factory()->count(3)->create();
        $this->assertDatabaseCount('cakes', 3);
    }

    public function test_paginated_cake_listing_route_responding_successfully()
    {
        Cake::factory()->count(3)->create();
        $response = $this->get('/api/cakes');

        $response->assertOk()
                 ->assertJsonStructure(
                     [
                         'data',
                         'meta',
                         'links'
                     ]
                 );
    }

    public function test_when_a_cake_record_contains_the_correct_fields()
    {
        $cake = Cake::factory()->create();

        $response = $this->get("/api/cakes/{$cake->id}");

        $response->assertOk()
                 ->assertJsonStructure(
                     [
                         'id',
                         'name',
                         'weight',
                         'value',
                         'amount',
                         'created_at',
                         'updated_at'
                     ]
                 );
    }

    public function test_when_a_cake_record_is_successfully_registered()
    {
        $response = $this->post(
            '/api/cakes',
            [
                'name' => $this->faker->name,
                'weight' => round($this->faker->randomFloat(max: 10000), 2),
                'value' => round($this->faker->randomFloat(max: 10000), 2),
                'amount' => $this->faker->numberBetween(int2: 10000)
            ]
        );

        $response->assertCreated()
                 ->assertJsonStructure(
                     [
                         'id',
                         'name',
                         'weight',
                         'value',
                         'amount',
                         'created_at',
                         'updated_at'
                     ]
                 );
    }

    public function test_when_a_cake_record_is_successfully_updated()
    {
        $cake = Cake::factory()->create();

        $response = $this->patch(
            "/api/cakes/{$cake->id}",
            [
                'name' => $this->faker->name,
                'weight' => round($this->faker->randomFloat(max: 10000), 2),
                'value' => round($this->faker->randomFloat(max: 10000), 2),
                'amount' => $this->faker->numberBetween(int2: 10000)
            ]
        );

        $response->assertOk()
                 ->assertJsonPath('is_updated', true);
    }

    public function test_when_a_cake_record_is_successfully_deleted()
    {
        $cake = Cake::factory()->create();

        $response = $this->delete("/api/cakes/{$cake->id}");

        $response->assertOk()
                 ->assertJsonPath('is_deleted', true);
    }
}

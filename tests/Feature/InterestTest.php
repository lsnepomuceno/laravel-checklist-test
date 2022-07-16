<?php

namespace Tests\Feature;

use App\Models\{Cake, Interest};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InterestTest extends TestCase
{
    use RefreshDatabase;

    public function test_successfully_creating_cake_interested_records_with_factory()
    {
        Interest::factory()->count(3)->create();
        $this->assertDatabaseCount('interests', 3);
    }

    public function test_paginated_interest_listing_route_responding_successfully()
    {
        Interest::factory()->count(3)->create();
        $response = $this->get('/api/interests');

        $response->assertOk()
                 ->assertJsonStructure(
                     [
                         'data',
                         'meta',
                         'links'
                     ]
                 );
    }

    public function test_when_a_interest_record_contains_the_correct_fields()
    {
        $interest = Interest::factory()->create();

        $response = $this->get("/api/interests/{$interest->id}");

        $response->assertOk()
                 ->assertJsonStructure(
                     [
                         'id',
                         'name',
                         'email',
                         'cake' => [
                             'id',
                             'name',
                             'weight',
                             'value',
                             'amount',
                             'created_at',
                             'updated_at'
                         ]
                     ]
                 );
    }

    public function test_when_a_interest_record_is_successfully_registered()
    {
        $cake = Cake::factory()->create();
        $response = $this->post(
            '/api/interests',
            [
                'name' => $this->faker->name,
                'email' => $this->faker->email,
                'cake_id' => $cake->id
            ]
        );

        $response->assertCreated()
                 ->assertJsonStructure(
                     [
                         'id',
                         'name',
                         'email',
                         'cake' => [
                             'id',
                             'name',
                             'weight',
                             'value',
                             'amount',
                             'created_at',
                             'updated_at'
                         ]
                     ]
                 );
    }

    public function test_when_a_interest_record_is_successfully_updated()
    {
        $cake = Cake::factory()->create();
        $interest = Interest::factory()->create();

        $response = $this->patch(
            "/api/interests/{$interest->id}",
            [
                'name' => $this->faker->name,
                'email' => $this->faker->email,
                'cake_id' => $cake->id
            ]
        );

        $response->assertOk()
                 ->assertJsonPath('is_updated', true);
    }

    public function test_when_a_interest_record_is_successfully_deleted()
    {
        $interest = Interest::factory()->create();

        $response = $this->delete("/api/interests/{$interest->id}");

        $response->assertOk()
                 ->assertJsonPath('is_deleted', true);
    }
}

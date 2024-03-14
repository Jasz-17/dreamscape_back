<?php

namespace Tests\Feature\Api;

use App\Models\Destination;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DestinationControllerTest extends TestCase
{
    use RefreshDatabase;


    public function testIndexReturnsNoDestinationsIfNoneAvailable()
    {
        $response = $this->getJson('/api');

        $response->assertStatus(404)
            ->assertJson(['msg' => 'No hay destinos disponibles']);
    }
  }
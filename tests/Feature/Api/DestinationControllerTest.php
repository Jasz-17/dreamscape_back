<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
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
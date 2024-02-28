<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class Destinationtest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_index_return_status_200(): void
    {
        $response = $this->getJson('/api');

        $response->assertStatus(200);
    }

    public function test_return_msg_no_destinations(): void
    {
        $response = $this->getJson('/api');

        $response->assertJsonFragment(['msg'=>'No hay destinos']);
    }
}

<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RouteTest extends TestCase
{
    use RefreshDatabase;


    public function testAuthorizedUserCanAccessProtectedEndpoints()
    {

        $user = User::factory()->create();
        $token = $user->createToken('test_token')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson('/api/user');

        $response->assertStatus(200);
    }


    public function testUnauthorizedUserCannotAccessProtectedEndpoints()
    {
        $response = $this->getJson('/api/user');
        $response->assertStatus(401);
    }

    
}
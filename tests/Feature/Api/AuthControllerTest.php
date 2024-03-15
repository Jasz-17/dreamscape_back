<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCanRegister()
    {
        $response = $this->postJson('/api/register', [
            'name' => 'Sally Smith',
            'email' => 'sally@mail.com',
            'password' => '123456',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['token', 'message']);

        $this->assertDatabaseHas('users', [
            'email' => 'sally@mail.com',
        ]);
    }

    public function testUserCanLogin()
    {
        $user = User::factory()->create([
            'email' => 'sally@mail.com',
            'password' => bcrypt('123456'),
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'sally@mail.com',
            'password' => '123456',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['token', 'message']);
    }

    public function testUserCanLogout()
    {
        $user = User::factory()->create();

        $token = $user->createToken('test_token')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/logout');

        $response->assertStatus(200)
            ->assertJson(['success' => true]);
    }
}

<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_can_authenticate_using_the_bearer_token()
    {
        $registerResponse = $this->post('/api/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $token = $registerResponse->json()['access_token'];
        $response = $this->get('/api/user', [
            'authorization' => 'Bearer ' . $token,
            'accept' => 'application/json'
        ]);

        /** @var User $user */
        $user = auth('sanctum')->user();
        $this->assertAuthenticated();
        $response->assertJson($user->toArray());
    }

    public function test_users_can_not_authenticate_with_invalid_bearer_token()
    {
        $response = $this->get('/api/user', [
            'authorization' => 'Bearer ' . 'wrong token',
            'accept' => 'application/json'
        ]);

        $response->assertForbidden();
    }
}

<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TokenResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_reset_token_can_be_requested_with_base_auth()
    {
        $this->createUser();

        $response = $this->post(
            '/api/get-token',
            [
                'email' => 'test@example.com',
                'password' => 'password',
            ],
            [
                'accept' => 'application/json'
            ]
        );

        $token = $response->json()['access_token'];
        $assert = [
            'token_type' => 'Bearer',
            'access_token' => $token
        ];

        $response->assertJson($assert);
        $response->assertSuccessful();
    }

    public function test_request_token_failed_without_user_credentials()
    {
        $this->createUser();

        $response = $this->post(
            '/api/get-token',
            [
                'email' => 'test@example.com',
                'password' => 'wrong password',
            ],
            [
                'accept' => 'application/json'
            ]
        );

        $assertStructure = ['message', 'errors'];

        $response->assertJsonStructure($assertStructure);
        $response->assertUnprocessable();
    }

    private function createUser(): void
    {
        $this->post('/api/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
    }
}

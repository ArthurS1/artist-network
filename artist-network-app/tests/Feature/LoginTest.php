<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Database\Factories\UserFactory;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic login test.
     *
     * @return void
     */
    public function test_basic_login()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => '1234',
        ]);

        $response->assertStatus(200);
        $response->assertJson(['authentication' => 'ok']);
    }

    /**
     * A basic wrong password test.
     *
     * @return void
     */
    public function test_wrong_password_login()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong_password',
        ]);

        $response->assertStatus(200);
        $response->assertJson(['authentication' => 'ko']);
    }

    /**
     * A basic wrong email test.
     *
     * @return void
     */
    public function test_wrong_email_login()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => 'wrong_email',
            'password' => '1234',
        ]);

        $response->assertStatus(200);
        $response->assertJson(['authentication' => 'ko']);
    }
}

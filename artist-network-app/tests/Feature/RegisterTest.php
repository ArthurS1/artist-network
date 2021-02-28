<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_basic_register()
    {
        $response = $this->post('/register',[
            'email' => 'test@test.fr',
            'username' => 'username',
            'name' => 'name',
            'password' => 'password',
            'checkboxes' => [
                '0' => 'cgu'
            ],
        ]);

        $response->assertStatus(200);
    }
}

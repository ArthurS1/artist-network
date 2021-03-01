<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Faker\Factory;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic register tests.
     *
     * @return void
     */
    public function test_basic_register()
    {
        $form = $this->make_fake_form();
        $response = $this->post('/register', $form);

        $response->assertStatus(200);
        $this->assertDatabaseHas('users', [
            'email' => $form['email'],
            'username' => $form['username'],
            'name' => $form['name'],
            'newsletter' => "0",
        ]);
    }

    /**
     * A basic register tests.
     *
     * @return void
     */
    public function test_invalid_email()
    {
        $form = $this->make_fake_form();
        $form['email'] = 'test';
        $response = $this->post('/register', $form);

        $response->assertStatus(302);
    }

    private function make_fake_form()
    {
        $faker = Factory::create();

        //$faker->randomElements(array('promotion', 'cgu), $faker->numberBetween(0, 2)), // Pour tester avec des checkboxes au hasard
        return [
            'email' => $faker->email,
            'username' => $faker->lastName,
            'name' => $faker->word,
            'password' => $faker->word,
            'checkboxes' => ['cgu'],
        ];
    }
}

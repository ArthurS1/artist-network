<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use App\Models\Post;
use App\Models\User;
use Tests\TestCase;

class TimelineTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_basic_timeline_expension()
    {
        $user = User::factory()->create();
        $posts = Post::factory(10)->create();

        $response = $this->actingAs($user)->get("/api/posts", ["offset" => "1"]);
        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_empty_timeline()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get("/api/posts", ["offset" => "1"]);
        $response->assertJson([]);
        $response->assertStatus(200);
    }
}

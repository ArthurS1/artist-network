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
    use RefreshDatabase, WithFaker;

    /**
     * A basic loading of new older posts.
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
     * A basic loading when there is no posts anymore to load.
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

    /**
     * A basic post by the user.
     *
     * @return void
     */
    public function test_user_add_post()
    {
        $user = User::factory()->create();
        $postTitle = $this->faker->sentence(6, true);

        $response = $this->actingAs($user)->post("/api/post", [
            "title" => $postTitle,
        ]);
        $this->assertDatabaseHas('posts', [
            'title' => $postTitle,
        ]);
        $response->assertStatus(200);
    }
}

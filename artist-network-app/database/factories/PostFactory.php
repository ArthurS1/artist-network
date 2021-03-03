<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(6, true),
            'views' => $this->faker->numberBetween(0, 200),
            'likes' => $this->faker->numberBetween(0, 200),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}

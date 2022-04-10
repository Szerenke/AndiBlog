<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $charTitle = $this->faker->numberBetween(30, 150);
        $charContent = $this->faker->numberBetween(1500, 4500);

        $postContent = $this->faker->text($charContent);

        return [
            'post_title' => $this->faker->text($charTitle),
            'post_content' => $postContent,
            'post_intro' => substr($postContent, 0, 255),
        ];
    }
}

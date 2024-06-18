<?php

namespace Database\Factories;

use App\Models\PostCategory;
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
        return [
            'title'         => $this->faker->sentence(mt_rand(2, 8)),
            'slug'          => $this->faker->slug(),
            'excerpt'       => $this->faker->paragraph(),
            'body'          => '<p>' . implode('</p><p>', $this->faker->paragraphs(mt_rand(5, 10))) . '</p><p>',
            'post_category_id'   => PostCategory::inRandomOrder()->first()->id,
            'user_id'       => 1
        ];
    }
}

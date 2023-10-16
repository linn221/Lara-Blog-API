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
    public function definition(): array
    {
        $title = fake()->text();
        $slug = generate_slug($title);
        $content = fake()->sentence(rand(1, 10));
        $category_id = rand(1, count(config('seeding.categories')));

        // return [
        //     'title' => $title,
        //     'slug' => $slug,
        //     'content' => $content,
        //     'category_id' => $category_id,
        // ];
        return compact('title', 'slug', 'content', 'category_id');
    }
}

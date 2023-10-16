<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);

        // create tags & categories for testing convinence
        $categories = config('seeding.categories');
        $tags = config('seeding.tags');
        foreach($categories as $category) {
            Category::factory()->create([
                'name' => $category
            ]);
        }

        foreach($tags as $tag) {
            Tag::factory()->create([
                'name' => $tag
            ]);
        }
    }
}

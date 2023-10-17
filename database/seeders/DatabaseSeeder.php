<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
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
            'bio' => 'Blogger who loves writing',
            'information' => "facebook: <facebook url>\ninstagram: <url>",
        ]);

        $this->call([
            CategorySeeder::class,
            TagSeeder::class,
            PostSeeder::class
        ]);

        Post::find(1)->update([
            'title' => 'welcome post',
            'slug' => 'hello-world'
        ]);

        $token = User::find(1)->createToken('first')->plainTextToken;
        echo "\n$token\n";
    }
}
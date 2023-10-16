<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Post::factory(200)->create();
        $post_count = config('seeding.count.posts');
        Post::factory($post_count)->create();
        $tags = Tag::all();

        // connect each tag to 60 random posts, putting tags for every post
        $related_posts_id = range(1, $post_count);
        foreach($tags as $tag) {
            shuffle($related_posts_id);

            $tag->posts()->sync(array_slice($related_posts_id, 0, 60));
        }
        //
    }
}

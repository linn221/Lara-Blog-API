<?php

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

function get_public_url(string $uri) : string
{
    return asset(Storage::url($uri));
}

function get_file_size(int $byte_size) : string
{
    // @refactor handle case for mega bytes
    $mega = 1000000;
    $kilo = 1000;
    $kb = $byte_size / $kilo;
    return "$kb kB";
}

function generate_slug(string $title) : string
{
    $limit = 50;
    do {
        $slug = Str::slug(Str::limit($title, $limit));
        $limit--;
    } while(Post::where('slug', $slug)->first());

    return $slug;
}

function cache_ttl() : int
{
    return Carbon::now()->secondsUntilEndOfDay();
}

function clear_post_related_cache(Post $post) : void
{
        // clearing cache of category,tags related to post
        Cache::forget("categories.$post->category_id");
        $tags = $post->tags;
        foreach($tags as $tag) {
            Cache::forget("tags.$tag->id");
        }
}
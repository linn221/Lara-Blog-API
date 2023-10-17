<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    private function clearRelatedCache(Post $post)
    {
        // clearing cache of category,tags related to post
        Cache::forget("categories.$post->category_id");
        $tags = $post->tags;
        foreach($tags as $tag) {
            Cache::forget("tags.$tag->id");
        }
        //

    }
    public function created(Post $post): void
    {
        $this->clearRelatedCache($post);
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        $this->clearRelatedCache($post);
        //
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        $this->clearRelatedCache($post);
        //
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        $this->clearRelatedCache($post);
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        $this->clearRelatedCache($post);
        //
    }
}

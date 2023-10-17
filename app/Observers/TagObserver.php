<?php

namespace App\Observers;

use App\Models\Tag;
use Illuminate\Support\Facades\Cache;

class TagObserver
{
    /**
     * Handle the Tag "created" event.
     */
    private function clearCache()
    {
        Cache::forget('tags');
    }

    public function created(Tag $tag): void
    {
        $this->clearCache();
        //
    }

    /**
     * Handle the Tag "updated" event.
     */
    public function updated(Tag $tag): void
    {
        $this->clearCache();
        //
    }

    /**
     * Handle the Tag "deleted" event.
     */
    public function deleted(Tag $tag): void
    {
        $this->clearCache();
        //
    }

}

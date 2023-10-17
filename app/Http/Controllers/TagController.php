<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\TagCollection;
use App\Http\Resources\TagDetailResource;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $tags = Tag::withCount('posts')->get();
        $tags = Cache::remember('tags', Carbon::now()->secondsUntilEndOfDay(),function () {
            return Tag::withCount('posts')->get();
        });
        return TagResource::collection($tags);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        $tag = Tag::create([
            'name' => $request->name
        ]);
        return (new TagDetailResource($tag));
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        // $recent_posts = $tag->posts()
        // ->with('category', 'tags')->latest()->offset(0)->limit(10)->get();
        $recent_posts = Cache::remember("tags.$tag->id", Carbon::now()->secondsUntilEndOfDay(),function () use ($tag) {
            return $tag->posts()
                ->with('category', 'tags')->latest()->offset(0)->limit(10)->get();
        });
        return (new TagDetailResource($tag))->additional([
            'recent_posts' => PostResource::collection($recent_posts),
        ]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->update([
            'name' => $request->name
        ]);
        return new TagDetailResource($tag);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        Cache::forget("tags.$tag->id");
        $tag->delete();
        return response()->noContent();
        //
    }
}

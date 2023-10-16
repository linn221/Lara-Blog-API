<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostDetailResource;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return PostResource::collection($posts);
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $request->mergeIfMissing([
            'slug' => generate_slug($request->title)
        ]);

        $post = Post::create($request->only([
            'title',
            'slug',
            'content',
            'category_id',
            'cover_img'
        ]));
        $post->tags()->sync($request->tags);
        return new PostDetailResource($post);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return new PostDetailResource($post);
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->only([
            'title',
            'slug',
            'content',
            'category_id',
            'cover_img'
        ]));
        $post->tags()->sync($request->tags);

        return new PostDetailResource($post);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([
            'message' => 'Post deleted'
        ], 200);
        //
    }
}

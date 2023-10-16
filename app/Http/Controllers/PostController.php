<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostResourceCollection;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return new PostResourceCollection($posts);
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->only([
            'title',
            'slug',
            'content',
            'category_id'
        ]));
        $post->tags()->sync($request->tags);
        return $post;
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return $post;
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
            'category_id'
        ]));
        $post->tags()->sync($request->tags);

        return $post;
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
        ], 204);
        //
    }
}

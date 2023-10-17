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
        $posts = Post::with(['category', 'tags'])
        // @feat filter using tags array
        ->when(request()->cat_id, function ($query) {
            $query->where('category_id', request()->cat_id);
        })
        // search by keyword
        ->when(request()->kw, function ($query) {
            $keyword = request()->kw;
            $query->where('title', 'like', "%$keyword%")
            ->orWhere('content', 'like', "%$keyword%");
        })
        // sorting
        ->when(request()->order && in_array(request()->order, ['id', 'title', 'content', 'created_at', 'updated_at', 'category_id']), function($query) {
            $query->orderBy(request()->order, request()->has('desc') ? 'desc' : 'asc');
        })
        // paginating
        ->paginate(15)->withQueryString();
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

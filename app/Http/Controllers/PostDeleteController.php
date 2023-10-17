<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostDeleteController extends Controller
{
    public function trash()
    {
        $trash_posts = Post::onlyTrashed()->get();
        return PostResource::collection($trash_posts);
    }

    public function emptyTrash()
    {
        Post::onlyTrashed()->forceDelete();
        return response()->noContent();
    }

    public function recycleTrash()
    {
        Post::onlyTrashed()->restore();
        return response()->noContent();
    }

    public function recycleOne(string $id)
    {
        $post = Post::onlyTrashed()->where('id', $id)->first();
        if (is_null($post)) {
            return response()->json([
                'message' => 'Post does not exist'
            ], 404);
        }
        $post->restore();
        return response()->noContent();

    }

    public function emptyOne(string $id)
    {
        $post = Post::onlyTrashed()->where('id', $id)->first();
        if (is_null($post)) {
            return response()->json([
                'message' => 'Post does not exist'
            ], 404);
        }
        $post->delete();
        return response()->noContent();
    }

    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'numeric'

        ]);
        Post::destroy($request->ids);
        return response()->noContent();
    }
    //
}

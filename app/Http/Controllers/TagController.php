<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Http\Resources\TagCollection;
use App\Http\Resources\TagDetailResource;
use App\Http\Resources\TagResource;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::withCount('posts')->get();
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
        return new TagDetailResource($tag);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return new TagDetailResource($tag);
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
        $tag->delete();
        return response()->noContent();
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryDetailResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PostResource;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $categories = Category::withCount('posts')->get();
        $categories = Cache::remember('categories', cache_ttl(), fn() => Category::withCount('posts')->get());
        return CategoryResource::collection($categories);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create([
            'name' => $request->name
        ]);
        return new CategoryDetailResource($category);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // $recent_posts = $category->posts()
        // ->with('category', 'tags')->latest()->offset(0)->limit(10)->get();
        $recent_posts = Cache::remember("categories.$category->id", cache_ttl(), fn() => $category->posts()->with('category', 'tags')
            ->limit(10)->latest('updated_at')->get());

        return (new CategoryDetailResource($category))->additional([
            'recent_posts' => PostResource::collection($recent_posts),
        ]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        Cache::forget("categories.$category->id");
        $category->update([
            'name' => $request->name
        ]);
        return new CategoryDetailResource($category);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Cache::forget("categories.$category->id");
        $category->delete();
        return response()->noContent();
        //
    }
}

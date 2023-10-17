<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'content' => Str::limit($this->content, 100),
            'category' => $this->category->name,
            'category_id' => $this->category->id,
            'cover_img' => $this->cover_img ?? config('default.post_cover_img'),
            'tags' => $this->tags->pluck('name'),
            // 'tags_id' => $this->tags->pluck('id'),
            'created_at' => $this->created_at->format('d-m-Y h:i:s'),
            'updated_at' => $this->updated_at->format('d-m-Y h:i:s'),
            // 'created_at' => $this->updated_at->diffForHumans()
        ];
    }
}

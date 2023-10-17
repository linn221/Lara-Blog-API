<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ImageResource extends JsonResource
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
            'url' => get_public_url($this->uri),
            'filename' => $this->filename,
            'file size' => get_file_size($this->filesize),
            'caption' => $this->caption ?? 'None'
        ];
    }
}

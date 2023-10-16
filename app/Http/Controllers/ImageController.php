<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Http\Resources\ImageResource;
use App\Models\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::all();
        return ImageResource::collection($images);
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImageRequest $request)
    {
        $file = $request->file('image');
        $image_uri = $file->store('public/images');

        $image = new Image;
        $image->uri = $image_uri;
        $image->filesize = $file->getSize();
        $image->filename = $file->getClientOriginalName();
        $image->caption = $request->caption;
        $image->save();
        return new ImageResource($image);
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        Storage::delete($image->uri);
        $image->delete();
        return response()->noContent();
        //
    }
}

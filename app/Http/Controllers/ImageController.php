<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Http\Resources\ImageResource;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $images = Image::all();
        $images = Cache::rememberForever('images', fn() => Image::all());
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
        Cache::forget('images');
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
        Cache::forget('images');
        return response()->noContent();
        //
    }

    public function bulkStore(Request $request)
    {
        // @fix limit file size
        $request->validate([
            'image' => 'required|array',
            'image.*' => 'file|mimetypes:image/jpeg,image/png,image/jpg|min:20|max:5000',
        ]);
        $files = $request->file('image');
        $storedImages = collect();
        foreach ($files as $file) {
            $image_uri = $file->store('public/images');

            $image = new Image;
            $image->uri = $image_uri;
            $image->filesize = $file->getSize();
            $image->filename = $file->getClientOriginalName();
            $image->save();
            $storedImages->add($image);
        }
        Cache::forget('images');
        return ImageResource::collection($storedImages);
    }

    public function bulkDelete(Request $request)
    {

        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'numeric'
        ]);

        $images = Image::whereIn('id', $request->ids)->get();
        foreach($images as $image) {
            Storage::delete($image->uri);
            $image->delete();
        }
        Cache::forget('images');
        return response()->noContent();
    }
}

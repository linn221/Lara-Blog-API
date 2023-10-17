<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostDeleteController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// dashboard
Route::middleware('auth:sanctum')->prefix('/dashboard')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // user setting
    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'showProfile');
        Route::patch('/user', 'updateProfile');
        Route::post('/change-password', 'changePassword');
    });

    // soft delete posts
    Route::prefix('/trash/post')->controller(PostDeleteController::class)->group(function () {
        Route::get('/', 'trash');
        Route::post('/recycle-all', 'recycleTrash');
        Route::post('/recycle/{id}', 'recycleOne');
        Route::post('/empty-all', 'emptyTrash');
        Route::post('/empty/{id}', 'emptyOne');
    });

    // bulk actions
    Route::post('/post/bulk-delete', [PostDeleteController::class, 'bulkDelete']);
    Route::post('/image/bulk-delete', [ImageController::class, 'bulkDelete']);
    Route::post('/image/bulk-upload', [ImageController::class, 'bulkStore']);

    Route::apiResource('/category', CategoryController::class);
    Route::apiResource('/post', PostController::class);
    Route::apiResource('/tag', TagController::class);
    Route::apiResource('/image', ImageController::class)->only(['index', 'store', 'destroy']);
});

// open to public
Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
});

// Route::get('/index', [PublicController::class, 'index']);
Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index');
    Route::get('/post/{post:slug}', 'show');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index');
    Route::get('/category/{category:name}', 'show');
});

Route::controller(TagController::class)->group(function () {
    Route::get('/tags', 'index');
    Route::get('/tag/{tag:name}', 'show');
});

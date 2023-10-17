<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostDeleteController;
use App\Http\Controllers\TagController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::prefix('/trash/post')->controller(PostDeleteController::class)->group(function () {
        Route::get('/', 'trash');
        Route::post('/recycle-all', 'recycleTrash');
        Route::post('/recycle/{id}', 'recycleOne');
        Route::post('/empty-all', 'emptyTrash');
        Route::post('/empty/{id}', 'emptyOne');
    });
    Route::apiResource('/category', CategoryController::class);
    Route::apiResource('/post', PostController::class);
    Route::apiResource('/tag', TagController::class);
    Route::apiResource('/image', ImageController::class)->only(['index', 'store', 'destroy']);
});

Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
});

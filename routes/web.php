<?php

use App\Http\Controllers\RestTestController;
use App\Http\Controllers\Api\Blog\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::apiResource('rest', RestTestController::class)->names('restTest');
Route::prefix('blog')->group(function () {
    Route::apiResource('posts', PostController::class)->names('blog.posts');
});

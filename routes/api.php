<?php

use App\Http\Controllers\Api\Blog\Admin\CategoryController;
use App\Http\Controllers\Api\Blog\Admin\PostController;
use App\Http\Controllers\Api\Blog\PostController as BlogPostController;
use Illuminate\Support\Facades\Route;

Route::prefix('blog')->group(function () {
    Route::apiResource('posts', BlogPostController::class)
        ->names('api.blog.posts');
});

Route::prefix('admin/blog')->group(function () {
    Route::apiResource('categories', CategoryController::class)
        ->only(['index', 'store', 'update'])
        ->names('blog.admin.categories');

    Route::apiResource('posts', PostController::class)
        ->except(['show'])
        ->names('blog.admin.posts');
});

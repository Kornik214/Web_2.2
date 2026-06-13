<?php

use App\Http\Controllers\DiggingDeeperController;
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

Route::group(['prefix' => 'digging_deeper'], function () {
    Route::get('collections', [DiggingDeeperController::class, 'collections'])
        ->name('digging_deeper.collections');
    Route::get('process-video', [DiggingDeeperController::class, 'processVideo'])
        ->name('digging_deeper.processVideo');
    Route::get('prepare-catalog', [DiggingDeeperController::class, 'prepareCatalog'])
        ->name('digging_deeper.prepareCatalog');
});

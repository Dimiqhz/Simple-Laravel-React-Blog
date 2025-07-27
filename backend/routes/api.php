<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\CommentController;
use Illuminate\Support\Facades\Route;

Route::prefix('articles')->group(function () {
    Route::get('/', [ArticleController::class, 'index']);                // GET /api/articles
    Route::get('/{id}', [ArticleController::class, 'show']);             // GET /api/articles/{id}
    Route::post('/', [ArticleController::class, 'store']);               // POST /api/articles
    Route::post('/{id}/comments', [CommentController::class, 'store']);  // POST /api/articles/{id}/comments
});

<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\CommentController;
use Illuminate\Support\Facades\Route;

Route::apiResource('articles', ArticleController::class)
     ->only(['index', 'show', 'store']);

Route::post('/articles', [ArticleController::class, 'store']);
Route::post('/articles/{article}/comments', [CommentController::class, 'store']);



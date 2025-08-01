<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;
use App\Services\CommentService;

/**
 * Контроллер для добавления комментариев
 */
class CommentController extends Controller
{
    public function __construct(
        protected CommentService $commentService
    ) {}

    /**
     * Добавить комментарий к статье
     *
     * @param StoreCommentRequest $request
     * @param int $articleId
     * @return JsonResponse
     */
    public function store(StoreCommentRequest $request, int $articleId): JsonResponse
    {
        $data = $request->validate([
        'body'        => 'required|string',
        'author_name' => 'required|string',
        ]);

        $comment = \App\Models\Article::findOrFail($articleId)
                   ->comments()
                   ->create($data);

        return response()->json($comment, 201);
    }
}

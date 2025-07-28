<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use Illuminate\Http\JsonResponse;
use App\Services\ArticleService;

/**
 * Контроллер для работы со статьями
 */
class ArticleController extends Controller
{
    public function __construct(
        protected ArticleService $articleService
    ) {}

    /**
     * Получить список всех статей
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $articles = $this->articleService->getAll();
        return response()->json($articles);
    }

    /**
     * Получить одну статью по ID с комментариями
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $article = $this->articleService->getByIdWithComments($id);
        return response()->json($article);
    }

    /**
     * Создать новую статью
     *
     * @param StoreArticleRequest $request
     * @return JsonResponse
     */
    public function store(StoreArticleRequest $request): JsonResponse
    {
        $article = $this->articleService->create($request->validated());
        return response()->json($article, 201);
    }
}

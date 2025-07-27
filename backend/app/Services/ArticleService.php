<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

/**
 * Сервис для работы со статьями
 */
class ArticleService
{
    /**
     * Получить все статьи в порядке убывания даты
     *
     * @return Collection<Article>
     */
    public function getAll(): Collection
    {
        return Article::latest()->get();
    }

    /**
     * Получить одну статью с комментариями
     *
     * @param int $id
     * @return Article
     */
    public function getByIdWithComments(int $id): Article
    {
        return Article::with('comments')->findOrFail($id);
    }

    /**
     * Создать статью
     *
     * @param array $data
     * @return Article
     */
    public function create(array $data): Article
    {
        return Article::create($data);
    }
}

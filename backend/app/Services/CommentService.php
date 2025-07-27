<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Comment;

/**
 * Сервис для работы с комментариями
 */
class CommentService
{
    /**
     * Создать комментарий к статье
     *
     * @param Article $article
     * @param array $data
     * @return Comment
     */
    public function addToArticle(Article $article, array $data): Comment
    {
        $comment = new Comment($data);
        $comment->article()->associate($article);
        $comment->save();

        return $comment;
    }
}

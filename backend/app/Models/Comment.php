<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Модель комментария
 *
 * @property int $id
 * @property int $article_id
 * @property string $author_name
 * @property string $content
 * @property \Illuminate\Support\Carbon $created_at
 */
class Comment extends Model
{
    protected $fillable = ['article_id', 'author_name', 'content'];

    /**
     * Получить статью, к которой относится комментарий
     *
     * @return BelongsTo
     */
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}

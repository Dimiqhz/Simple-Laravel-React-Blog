<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    use HasFactory;

    protected $fillable = ['article_id', 'body', 'author_name', 'content'];

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

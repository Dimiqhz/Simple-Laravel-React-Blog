<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Фабрика для генерации комментариев
 *
 * @extends Factory<Comment>
 */
class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'article_id' => \App\Models\Article::factory(),
            'body'       => $this->faker->sentence(),
            'author_name' => $this->faker->name(),
        ];
    }
}

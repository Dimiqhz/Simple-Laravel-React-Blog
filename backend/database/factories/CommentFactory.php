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

    public function definition(): array
    {
        return [
            'author_name' => $this->faker->name(),
            'content' => $this->faker->sentence(10),
        ];
    }
}

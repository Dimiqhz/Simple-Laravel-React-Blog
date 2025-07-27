<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

/**
 * Сидер, создающий статьи и комментарии
 */
class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        Article::factory(5)->create()->each(function ($article) {
            $article->comments()->createMany(
                \App\Models\Comment::factory(rand(2, 5))->make()->toArray()
            );
        });
    }
}

<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Article;
use App\Models\Comment;

class ArticleApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_returns_all_articles_in_desc_order()
    {
        // создаём 2 статьи с разными датами
        Article::factory()->create(['created_at' => now()->subDay(), 'title' => 'Old']);
        Article::factory()->create(['created_at' => now(),          'title' => 'New']);

        $response = $this->getJson('/api/articles');

        $response->assertStatus(200)
                 ->assertJsonPath('0.title', 'New')
                 ->assertJsonPath('1.title', 'Old');
    }

    /** @test */
    public function show_returns_article_with_comments()
    {
        $article = Article::factory()->create();
        Comment::factory()->count(3)->create(['article_id' => $article->id]);

        $response = $this->getJson("/api/articles/{$article->id}");

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'id', 'title', 'body', 'created_at', 'updated_at',
                     'comments' => [
                         '*' => ['id','body','article_id','created_at','updated_at']
                     ]
                 ]);
    }

    /** @test */
    public function store_creates_article_and_returns_201()
    {
        $payload = [
            'title' => 'Заголовок тест',
            'body'  => 'Текст тестовой статьи',
        ];

        $response = $this->postJson('/api/articles', $payload);

        $response->assertStatus(201)
                 ->assertJsonFragment($payload);

        $this->assertDatabaseHas('articles', $payload);
    }
}

<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Article;

class ArticleApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_article_list(): void
    {
        Article::factory()->count(3)->create();

        $response = $this->getJson('/api/articles');

        $response->assertStatus(200)->assertJsonCount(3);
    }

    public function test_can_create_article(): void
    {
        $data = [
            'title' => 'Тестовая статья',
            'content' => 'Содержимое статьи',
        ];

        $response = $this->postJson('/api/articles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
        $this->assertDatabaseHas('articles', $data);
    }
}

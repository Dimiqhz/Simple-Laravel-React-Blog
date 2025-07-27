<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Article;

class CommentApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_comment(): void
    {
        $article = Article::factory()->create();

        $data = [
            'author_name' => 'Иван',
            'content' => 'Комментарий к статье',
        ];

        $response = $this->postJson("/api/articles/{$article->id}/comments", $data);

        $response->assertStatus(201)->assertJsonFragment($data);
        $this->assertDatabaseHas('comments', $data);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\News;

class NewsTest extends TestCase
{
    public function test_can_create_a_news(): void
    {
        $user = User::factory()->create();
        $newsFake = News::factory(['views' => 0, 'created_by' => $user->id])->make();

        $this->actingAs($user)
            ->post('/noticias/salva', $newsFake->toArray());

        $this->assertDatabaseHas('news', $newsFake->getAttributes());
    }

    public function test_can_update_news(): void
    {
        $userCreating = User::factory()->create();
        $userUpdating = User::factory()->create();
        $news = News::factory()->create(['updated_by' => $userCreating['id'], 'created_by' => $userCreating['id'], 'views' => 0]);
        $newsFake = News::factory()->make(['id' => $news['id'], 'views' => 0, 'updated_by' => $userCreating['id'], 'created_by' => $userCreating['id'] ]);

        $this->actingAs($userUpdating)
            ->post('/noticias/atualiza/' . strval($news['id']), $newsFake->toArray() );

        $this->assertDatabaseHas('news', $newsFake->getAttributes());
    }

    public function test_can_delete_news(): void
    {
        $user = User::factory()->create();
        $news = News::factory()->create();

        $this->actingAs($user)
            ->delete('/noticias/apaga/' . strval($news['id']));

        $this->assertDatabaseMissing('news', $news->getAttributes());
    }
}

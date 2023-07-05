<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;
use App\Models\User;

class CategoryTest extends TestCase
{
    public function test_can_create_a_category(): void
    {
        $user = User::factory()->create();
        $categoryFake = Category::factory(['created_by' => $user->id])->make();

        $this->actingAs($user)
            ->post('/categorias/salva', $categoryFake->toArray());

        $this->assertDatabaseHas('category', $categoryFake->getAttributes());
    }

    public function test_can_delete_category(): void
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $newCategory = Category::factory()->create();

        $this->actingAs($user)
            ->post('/categorias/apaga/' . strval($category->id),  ['category_id' => $newCategory->id]);

        $this->assertDatabaseMissing('category', $category->getAttributes());
    }
}

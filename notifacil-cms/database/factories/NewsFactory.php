<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->realText(20),
            'summary' => $this->faker->realText(150),
            'content' => $this->faker->realText(300),
            'views' => rand(1,100),
            'public' => $this->faker->boolean(),
            'created_by' => User::factory(),
            'category_id' => Category::factory(),
        ];
    }
}

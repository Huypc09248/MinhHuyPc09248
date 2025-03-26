<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProductFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->sentence,
            'thumbnail' => $this->faker->imageUrl(640, 480, 'product'),  // 'cats' là danh mục của ảnh ngẫu nhiên
            'categories_id' => \App\Models\Category::factory(),  // '10' là số lượng danh mục
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'content'=> $this->faker->sentence

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
 
}

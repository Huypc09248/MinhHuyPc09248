<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class CategoryFactory extends Factory
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
            'slug' => Str::slug($this->faker->sentence),
            'description' => $this->faker->sentence,
            // 'thumbnail' => $this->faker->image(storage_path('app/public/category'), 640, 480, null, false),
            'thumbnail' => $this->faker->imageUrl(640, 480, 'cats'),  // 'cats' là danh mục của ảnh ngẫu nhiên
            'status' => $this->faker->randomElement(['active', 'inactive']), 
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
 
}

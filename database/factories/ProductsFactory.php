<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\Colors;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->word(),
            'slug' => fake()->word(),
            'description' => fake()->text(100),
            'cover' => fake()->imageUrl(),
            'favori' => fake()->boolean(),
            'released_at' => fake()->date(),
            'price' => fake()->numberBetween(20, 99),
            'promo' => fake()->numberBetween(10, 50),
        ];
    }
}

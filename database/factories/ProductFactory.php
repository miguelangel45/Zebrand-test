<?php

namespace Database\Factories;

use App\Models\Brand;
use Database\Seeders\BrandSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sku' => fake()->unique()->ean13(),
            'name' => fake()->word,
            'price' => fake()->randomFloat(),
            'brand_id' => Brand::factory()->create()->id
        ];
    }
}

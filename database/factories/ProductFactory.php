<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 5, 100), // Random price between 5 and 100
            'quantity' => $this->faker->numberBetween(1, 100), // Random quantity between 1 and 100
            'sku' => $this->faker->unique()->lexify('SKU-?????'), // Generates a unique SKU code
            'image' => $this->faker->imageUrl(640, 480, 'product', true), // Placeholder product image
            'is_active' => $this->faker->boolean(80), // 80% chance to be true
        ];
    }
}

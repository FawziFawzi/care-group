<?php

namespace Database\Factories;

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
            'name' => fake()->name(),
            'image' => asset('/notfound.jpg'),
            'description' => fake()->text(),
            'category' =>fake()->slug(),
            'price' => fake()->randomFloat(2, 1, 100),
            'user_id' => random_int(1, 5),
        ];
    }
}

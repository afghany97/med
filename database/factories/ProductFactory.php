<?php

namespace Database\Factories;

use App\enums\ProductTagsEnum;
use App\Models\User;
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
            'title' => $title = fake()->sentence(3),
            'description' => fake()->sentence,
            'price' => fake()->randomNumber(4),
            'image' => fake()->imageUrl(word: $title),
            'tag' => fake()->randomElement(array_column(ProductTagsEnum::cases(), 'value')),
            'customer_wishlist' => json_encode(fake()->randomElements(User::pluck('id')->toArray(), rand(1, 10))),
            'total_views' => fake()->randomNumber(3)
        ];
    }
}

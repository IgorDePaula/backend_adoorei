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
        $array = explode(' ', $this->faker->paragraph(1));
        return [
            'name' => reset($array),
            'description' => $this->faker->paragraph(1),
            'price' => $this->faker->randomFloat(2, 0, 10000),
        ];
    }
}

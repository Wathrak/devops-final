<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Terrain>
 */
class TerrainFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'owner_id' => User::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'location' => $this->faker->address,
            'area_size' => $this->faker->randomFloat(2, 50, 1000),
            'price_per_day' => $this->faker->randomFloat(2, 20, 500),
            'available_from' => now(),
            'available_to' => now()->addMonth(),
            'is_available' => true,
            'main_image' => $this->faker->imageUrl(640, 480, 'nature', true),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Terrain;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TerrainImage>
 */
class TerrainImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'terrain_id' => Terrain::factory(),
            'image_path' => $this->faker->imageUrl(640, 480),
            'uploaded_at' => now(),
        ];
    }

}

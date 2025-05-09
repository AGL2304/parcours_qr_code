<?php

namespace Database\Factories;

use App\Models\Site; // Ajoutez cette ligne
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Site>
 */
class SiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Site::class; // Ajoutez cette ligne
    
    public function definition()
    {
        return [
            'nom' => $this->faker->unique()->city . ' - Site',
            'description' => $this->faker->paragraph,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
        ];
    }
}
<?php

namespace Database\Factories;

use App\Models\Parcours; // Ajoutez cette ligne
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parcours>
 */
class ParcoursFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Parcours::class; // Ajoutez cette ligne

    public function definition()
    {
        return [
            'nom' => 'Parcours - ' . $this->faker->word,
            'description' => $this->faker->sentence,
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
        ];
    }
}
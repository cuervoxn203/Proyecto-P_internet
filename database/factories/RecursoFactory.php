<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recurso>
 */
class RecursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        'titulo' => $this->faker->sentence,
        'descripcion' => $this->faker->paragraph,
        'tipo' => $this->faker->word,
        'url' => $this->faker->url, // URL de web o archivo en el storage
        'categoria' => $this->faker->word,
        'fecha_creacion' => $this->faker->date,
        ];
    }
}

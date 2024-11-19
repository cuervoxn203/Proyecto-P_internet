<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Formulario>
 */
class FormularioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->unique()->word,
            'preguntas' => json_encode($this->faker->sentences(3)),
            'descripcion' => $this->faker->optional()->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

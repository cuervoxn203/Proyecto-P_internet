<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RespuestasFormulario>
 */
class RespuestasFormularioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'formulario_id' => \App\Models\Formulario::factory(),
            'respuestas' => json_encode($this->faker->words(5)), // Generate a JSON string
            'fecha' => $this->faker->date(),
        ];
    }
}

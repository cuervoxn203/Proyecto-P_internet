<?php

namespace Database\Factories;

use App\Models\Terapeuta;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consulta>
 */
class ConsultaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'paciente_id' => \App\Models\User::factory(),
            'descripcion' => $this->faker->paragraph,
            'fecha_hora' => $this->faker->dateTime,
            'terapeuta_id' => Terapeuta::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

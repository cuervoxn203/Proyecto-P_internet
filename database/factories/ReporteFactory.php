<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reporte>
 */
class ReporteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'id_usuario' => \App\Models\User::factory(),
        'datos_reporte' => json_encode($this->faker->words(5)),
        'tipo_reporte' => $this->faker->word(),
        'fecha_generacion' => $this->faker->dateTime(),
        'descripcion' => $this->faker->optional()->text(),
        ];
    }
}

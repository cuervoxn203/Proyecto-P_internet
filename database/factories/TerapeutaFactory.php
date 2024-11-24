<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Terapeuta>
 */
class TerapeutaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'especialidad' => $this->faker->word,
            'telefono' => $this->faker->phoneNumber,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UsuarioRecurso;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(20)->create();

        User::factory()->withPersonalTeam()->create([
            'email' => 'admin@example.com',
        ]);

        $this->call([
            FormularioSeeder::class,
            TerapeutaSeeder::class,
            ConsultaSeeder::class,
            RespuestasFormularioSeeder::class,
            ReporteSeeder::class,
            RecursoSeeder::class,
            UsuarioRecursoSeeder::class,
        ]);
    }
}

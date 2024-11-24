<?php

namespace Database\Seeders;

use App\Models\UsuarioRecurso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioRecursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        UsuarioRecurso::factory()->count(10)->create();
    }
}

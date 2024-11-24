<?php

namespace Database\Seeders;

use App\Models\RespuestasFormulario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RespuestasFormularioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        RespuestasFormulario::factory()->count(20)->create();
    }
}

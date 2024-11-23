<?php

namespace Database\Seeders;

use Database\Factories\RespuestasFormularioFactory;
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
        RespuestasFormularioFactory::factory()->count(10)->create();
    }
}

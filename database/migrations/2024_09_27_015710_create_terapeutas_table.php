<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerapeutasTable extends Migration
{
    public function up()
    {
        Schema::create('terapeutas', function (Blueprint $table) {
            $table->id(); // Columna id
            $table->string('nombre'); // Columna nombre
            $table->string('email')->unique(); // Columna email, único
            $table->string('especialidad'); // Columna especialidad
            $table->string('telefono'); // Columna teléfono
            $table->timestamps(); // Columna timestamps (created_at, updated_at)
        });
    }

    public function down()
    {
        Schema::dropIfExists('terapeutas'); // Eliminar tabla si es necesario
    }
}

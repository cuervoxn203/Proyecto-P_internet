<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::create('reportes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_usuario')->constrained('users')->onDelete('cascade'); // Llave foránea hacia usuarios
        $table->json('datos_reporte'); // Para almacenar JSON
        $table->string('tipo_reporte'); // Texto corto
        $table->timestamp('fecha_generacion'); // Fecha y hora
        $table->text('descripcion')->nullable(); // Descripción (opcional)
        $table->timestamps();
    });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes');
    }
};

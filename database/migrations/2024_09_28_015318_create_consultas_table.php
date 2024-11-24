<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->string('paciente'); // Nombre del paciente
            $table->text('descripcion'); // Descripción de la consulta
            $table->dateTime('fecha_hora'); // Fecha y hora de la consulta

            // Clave foránea que referencia la tabla de terapeutas
            $table->foreignId('terapeuta_id')
                  ->constrained('terapeutas')
                  ->onDelete('cascade');

            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultas');
    }
}

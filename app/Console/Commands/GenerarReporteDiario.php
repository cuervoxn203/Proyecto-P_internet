<?php

namespace App\Console\Commands;

use App\Models\Reporte;
use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class GenerarReporteDiario extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generar-reporte-diario';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generar reportes diarios para todos los usuarios.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Creamos reportes diarios para todos los usuarios
        $users = User::all();
        foreach($users as $user){
            $datos_reporte = $this->generarDatosReporte($user);

            Reporte::create([
                'id_usuario' => $user->id,
                'datos_reporte' => json_encode($datos_reporte),
                'tipo_reporte' => 'diario',
                'fecha_generacion' => Carbon::now(),
                'descripcion' => 'Reporte diario generado automáticamente.',
            ]);
        }
        $this->info('Reportes diarios generados exitosamente.');
    }

    private function generarDatosReporte(User $user)
    {
        // De momento solo añadimos formularios y consultas que se hayan hecho el mismo dia
        $formularios = $user->formularios->filter(function($formulario) {
            return $formulario->created_at->isToday();
        });
        $consultas = $user->consultas->filter(function($consulta) {
            return $consulta->created_at->isToday();
        });
        return ['formularios' => $formularios, 'consultas' => $consultas];
    }
}

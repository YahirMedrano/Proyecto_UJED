<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Event;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
        {
            $schedule->call(function () {
                // Obtener eventos cuya fecha haya pasado
                $eventosPasados = Event::where('fecha_fin', '<', now())->get();

                // Actualizar el estado de los eventos a "Pasado"
                foreach ($eventosPasados as $evento) {
                    $evento->update(['expiracion' => 'Pasado']);
                }
            })->daily();
        }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

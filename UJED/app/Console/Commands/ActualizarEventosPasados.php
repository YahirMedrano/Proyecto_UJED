<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Event;

class ActualizarEventosPasados extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eventos:actualizar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualiza el estado de eventos pasados a "Pasado"';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $eventosPasados = Event::where('fecha_fin', '<', Carbon::now())->get();

        foreach ($eventosPasados as $evento) {
            $evento->expiracion = 'Pasado';
            $evento->save();
        }

        $this->info('Se han actualizado los eventos pasados.');
    }
}

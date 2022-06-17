<?php

namespace App\Listeners\app\Providers;

use App\Events\app\Providers\SolicitudIngresoGrupo;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AvisarEncargadoNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\app\Providers\SolicitudIngresoGrupo  $event
     * @return void
     */
    public function handle(SolicitudIngresoGrupo $event)
    {
        //
    }
}

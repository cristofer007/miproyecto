<?php

namespace App\Listeners\app\Providers;

use App\Events\app\Providers\SolicitudMensaje;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AvisarSolicitudAdminNotification
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
     * @param  \App\Events\app\Providers\SolicitudMensaje  $event
     * @return void
     */
    public function handle(SolicitudMensaje $event)
    {
        //
    }
}

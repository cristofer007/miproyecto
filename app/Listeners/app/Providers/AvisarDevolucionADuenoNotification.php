<?php

namespace App\Listeners\app\Providers;

use App\Events\app\Providers\AvisoDevolucion;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AvisarDevolucionADuenoNotification
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
     * @param  \App\Events\app\Providers\AvisoDevolucion  $event
     * @return void
     */
    public function handle(AvisoDevolucion $event)
    {
        //
    }
}

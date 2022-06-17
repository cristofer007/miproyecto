<?php

namespace App\Listeners\app\Providers;

use App\Events\app\Providers\NuevaPublicacion;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ActualizarListadoPublicaciones
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
     * @param  \App\Events\app\Providers\NuevaPublicacion  $event
     * @return void
     */
    public function handle(NuevaPublicacion $event)
    {
        //
    }
}

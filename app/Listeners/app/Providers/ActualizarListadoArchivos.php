<?php

namespace App\Listeners\app\Providers;

use App\Events\app\Providers\ArchivoSubido;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ActualizarListadoArchivos
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
     * @param  \App\Events\app\Providers\ArchivoSubido  $event
     * @return void
     */
    public function handle(ArchivoSubido $event)
    {
        //
    }
}

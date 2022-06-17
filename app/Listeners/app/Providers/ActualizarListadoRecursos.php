<?php

namespace App\Listeners\app\Providers;

use App\Events\app\Providers\RecursoCompartido;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ActualizarListadoRecursos
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
     * @param  \App\Events\app\Providers\RecursoCompartido  $event
     * @return void
     */
    public function handle(RecursoCompartido $event)
    {
        //
    }
}

<?php

namespace App\Listeners\app\Providers;

use App\Events\app\Providers\RecursoSolicitado;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SolicitarRecursoDuenoNotification
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
     * @param  \App\Events\app\Providers\RecursoSolicitado  $event
     * @return void
     */
    public function handle(RecursoSolicitado $event)
    {
        //
    }
}

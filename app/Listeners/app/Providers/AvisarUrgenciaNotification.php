<?php

namespace App\Listeners\app\Providers;

use App\Events\app\Providers\NuevaPublicacionUrgente;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AvisarUrgenciaNotification
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
     * @param  \App\Events\app\Providers\NuevaPublicacionUrgente  $event
     * @return void
     */
    public function handle(NuevaPublicacionUrgente $event)
    {
        //
    }
}

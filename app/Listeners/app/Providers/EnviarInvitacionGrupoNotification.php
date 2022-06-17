<?php

namespace App\Listeners\app\Providers;

use App\Events\app\Providers\InvitarIngresoGrupo;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EnviarInvitacionGrupoNotification
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
     * @param  \App\Events\app\Providers\InvitarIngresoGrupo  $event
     * @return void
     */
    public function handle(InvitarIngresoGrupo $event)
    {
        //
    }
}

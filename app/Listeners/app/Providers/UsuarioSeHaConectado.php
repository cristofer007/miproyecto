<?php

namespace App\Listeners\app\Providers;

use App\Events\app\Providers\UsuarioConectado;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UsuarioSeHaConectado
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
     * @param  \App\Events\app\Providers\UsuarioConectado  $event
     * @return void
     */
    public function handle(UsuarioConectado $event)
    {
        //
    }
}

<?php

namespace App\Listeners\app\Providers;

use App\Events\app\Providers\UsuarioDesconectado;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UsuarioSeHaDesconectado
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
     * @param  \App\Events\app\Providers\UsuarioDesconectado  $event
     * @return void
     */
    public function handle(UsuarioDesconectado $event)
    {
        //
    }
}

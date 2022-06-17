<?php

namespace app\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class
        ],
        RecursoSolicitado::class => [
            SolicitarRecursoDuenoNotification::class
        ],
        AvisoDevolucion::class => [
            AvisarDevolucionADuenoNotification::class
        ],
        AsignacionEncargadoGrupo::class => [
            AvisarEncargoGrupoNotification::class
        ],
        SolicitudMensaje::class =>[
            AvisarSolicitudAdminNotification::class
        ],
        SolicitudIngresoGrupo::class => [
            AvisarEncargadoNotification::class
        ],
        InvitarIngresoGrupo::class => [
            EnviarInvitacionGrupoNotification::class
        ],
        NuevaPublicacionUrgente::class => [
            AvisarUrgenciaNotification::class
        ],
        NuevaPublicacion::class => [
            ActualizarListadoPublicaciones::class
        ],
        NuevoComentario::class => [
            ActualizarListadoComentarios::class
        ],
        UsuarioConectado::class => [
            UsuarioSeHaConectado::class
        ],
        UsuarioDesconectado::class => [
            UsuarioSeHaDesconectado::class
        ],
        ArchivoSubido::class => [
            ActualizarListadoArchivos::class
        ],
        RecursoCompartido::class => [
            ActualizarListadoRecursos::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

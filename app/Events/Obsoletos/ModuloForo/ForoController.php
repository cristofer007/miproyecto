<?php

namespace App\Http\Controllers\ModuloForo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Http\Controllers\ModuloForo\EjecutorConsultas;
use App\Notifications\AceptacionIngresoGrupo;
use App\Notifications\AsignacionEncargoGrupo;
use App\Notifications\InvitacionIngresoGrupo;
use App\Notifications\NuevaPublicacion;
use App\Notifications\NuevoComentario;
use App\Notifications\NuevoRecurso;
use App\Notifications\SolicitudIngresoGrupo;
use App\Notifications\SolicitudRecurso;

class ForoController extends Controller
{
    private $grupos;
    private $ejecutorConsultas;
    
//      public function __construct()
//      {
//          $this->ejecutorConsultas = new EjecutorConsultas();
//      }
//      
//      public function probarArray()
//      {
//          return $this->ejecutorConsultas->getDatosGrupos();
//      }
    
    public function __construct()
    {
        $this->ejecutorConsultas = new EjecutorConsultas();
        $this->grupos = new Grupos($this->ejecutorConsultas->getDatosGrupos());
        
    }
    
    public function getGrupos($idUsuario)
    {
        $idsGrupos = $this->ejecutorConsultas->getGrupos($idUsuario);
        $this->grupos->getGrupos($idsGrupos);
    }
    
    private function getGruposUsuario($idUsuario)
    {
        return $this->grupos->getGruposUsuario($idUsuario);
    }
    
    //Funcion de inicio de sesión.
    public function getVistaForo(Request $request)
    {
        Log::info(100);
        $datosGrupos = $this->getGruposUsuario(116);
        Log::info($datosGrupos);
        
        return response()->view('vistaforo', ["datosGrupos" => $datosGrupos]);
    }
    
    public function agregarNuevoGrupo(Request $request)
    {
        if ($this->ejecutorConsultas->agregarNuevoGrupo($request->user()->id, $request->input()))
        {
            $this->grupos->agregarNuevoGrupo($request->input());
        }
        return;
    }
    
    public function eliminarGrupo(Request $request)
    {
        if ($this->ejecutorConsultas->eliminarGrupo($request->user()->id, $request->input('id')) )
        {
            $this->grupos->eliminarGrupo($request->input('id'));
        }
        return;
    }
    
    public function modificarGrupo(Request $request)
    {
        if ($this->ejecutorConsultas->modificarGrupo($request->user()->id, $request->input('id'), $request->input('nuevosDatos')) )
        {
            $this->grupos->modificarGrupo($request->input('id'), $request->input('nuevosDatos'));
        }  
        return;
    }
    
    public function agregarNuevoCanal(Request $request)
    {
        if ($this->ejecutorConsultas->agregarNuevoCanal($request->user()->id, $request->input('idGrupo'), $request->input('datosNuevoCanal')))
        {
            $this->grupos->agregarNuevoCanal($request->input('datosNuevoCanal'));
        }
        return;
    }
    
    public function eliminarCanal(Request $request)
    {
        if ($this->ejecutorConsultas->eliminarCanal($request->user()->id, $request->input('id')) )
        {
            $this->grupos->eliminarCanal($request->input('id'));
        }
        return;
    }
    
    public function modificarCanal(Request $request)
    {
        if ($this->ejecutorConsultas->modificarCanal($request->user()->id, $request->input('id'), $request->input('nuevosDatos')) )
        {
            $this->grupos->modificarCanal($request->input('id'),$request->input('nuevosDatos') ); 
        }
        return;
    }
    
    public function escribirPublicacion(Request $request)
    {
        $this->ejecutorConsultas->escribirPublicacion($request->user()->id, $request->input("datosPublicacion"));
    }
    
    public function eliminarPublicacion($idGrupo, $idCanal, $idPublicacion)
    {
        if ($this->ejecutorConsultas->eliminarPublicacion($idPublicacion))
        {
            $this->grupos->eliminarPublicacion($idGrupo, $idCanal, $idPublicacion);
        }
        return;
    }
    
    public function modificarPublicacion($idPublicacion, $datosPublicacion)
    {
        $this->ejecutorConsultas->modificarPublicacion($idPublicacion, $datosPublicacion);
        return;
    }
    
    public function escribirComentario(Request $request)
    {
        $this->ejecutorConsultas->escribirComentario($idPublicacion, $datosComentario);
        return;
    }
    
//    public function getPublicaciones($idGrupo, $idCanal)
//    {
//        $this->ejecutorConsultas->getPublicaciones();
//    }
    
    public function solicitarIngresoGrupo(Request $request, $idGrupo)
    {
        $this->ejecutorConsultas->solicitarIngresoGrupo($request->user()->id, $idGrupo);
        return;
    }
    
    public function enviarInvitacionGrupo($idGrupo, $idUsuarioInvitado)
    {
        $this->ejecutorConsultas->enviarInvitacionGrupo();
        return;
    }
    
    public function eliminarMiembro($idUsuario, $idGrupo)
    {
        $this->ejecutorConsultas->eliminarMiembro($idUsuario, $idGrupo);
        return;
    }
    
    private function getNotificaciones($idUsuario)
    {
        $this->ejecutorConsultas->getNotificaciones();
        return;
    }
    
    public function getNuevaPaginaPublicaciones(){
        return $this->ejecutorConsultas->getNuevaPaginaPublicaciones();
    }
    
    public function getPublicaciones()
    {
        return $this->ejecutorConsultas->getPublicaciones(2);
    }
}

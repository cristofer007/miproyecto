<?php

namespace app\Http\Controllers\ModuloChat;

use app\Http\Controllers\ModuloChat\Conversaciones;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConversacionesController extends Controller
{
    private $conversaciones;
    private $usuariosConversaciones;
    private static $instanciaConversaciones;
    private $ejecutorConsultas;
    
    function __construct() {
        $this->conversaciones = array();
        $this->usuariosConversaciones = new Conversaciones();
        self::$instanciaConversaciones = $this;
        $this->ejecutorConsultas = new EjecutorConsultas();
    }
    
    public static function cargarConversacionesUsuario($idUsuario)
    {
        self::$instanciaConversaciones->cargarConversaciones($idUsuario);
    }
    
    private function cargarConversaciones($idUsuario)
    {
        
    }
    
    private function getConversaciones($idUsuario)
    {
        
    }
    
    function agregarMensaje(Request $request)
    {
        $this->ejecutorConsultas->agregarMensaje($idConversacion, $idAutor, $datosMensaje);
        $this->conversaciones->agregarMensaje();
    }
    
    function eliminarMensaje(Request $request)
    {
        $this->ejecutorConsultas->eliminarMensaje($idMensaje);
        $this->conversaciones->eliminarMensaje();
    }
    
    function modificarMensaje(Request $request)
    {
        $this->ejecutorConsultas->modificarMensaje($request->idMensaje, $request->nuevosDatos);
        $this->conversaciones->modificarMensaje();
    }
    
    function iniciarConversacion(Request $request)
    {
        $datosConversacion = $request->input();
        $;
        $this->ejecutorConsultas->iniciarConversacion($request->user()->id, $request->);
    } 
    
    function eliminarConversaciones(Request $request)
    {
        
    }
    
    function getVistaConversaciones(Request $request)
    {
        return view('vistaforo', getConversaciones($request->user()->id));
    }
}

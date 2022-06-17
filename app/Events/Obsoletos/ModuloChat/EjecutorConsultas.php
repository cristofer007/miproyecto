<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
use App\Models\Conversacion;
use App\Models\User;
use App\Models\Mensaje;

namespace app\Http\Controllers\ModuloChat;

/**
 * Description of EjecutorConsultas
 *
 * @author Pc
 */
class EjecutorConsultas {
            
    private function cargarConversaciones($idUsuario)
    {
        
    }
    
    private function getConversaciones($idUsuario)
    {
        
    }
    
    function agregarMensaje(Request $request)
    {
        $this->conversaciones->agregarMensaje();
    }
    
    function eliminarMensaje(Request $request)
    {
        $this->conversaciones->eliminarMensaje();
    }
    
    function modificarMensaje(Request $request)
    {
        $this->conversaciones->modificarMensaje();
    }
    
    function iniciarConversacion(Request $request)
    {
        
    } 
    
    function eliminarConversaciones(Request $request)
    {
        
    }
    
    function getVistaConversaciones(Request $request)
    {
        
    }
}

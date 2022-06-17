<?php

namespace App\Http\Controllers\ModuloUsuarios;

use App\Models\Usuario;


class UsuariosConectados extends Controller
{
    private $usuariosConectados;
    
    function __construct()
    {
        $this->usuariosConectados = array();
    }
    
    function getUsuarios()
    {
        
    }
    
    function getUsuario(String $idUsuario)
    {
        
    }
    
    //Método llamado para saber qué usuarios se encuentran conectados.
    function getUsuariosConectados()
    {
        
    }
    
    //Método llamado por el administrador para agregar un usuario de la lista.
    function agregarUsuario($usuario)
    {
        
    }
    
    //Método llamado por el administrador para quitar un usuario de la lista.
    function quitarUsuario($idUsuario)
    {
        
    }
    
    //Método llamado cuando el usuario inicia sesión. Activa el evento: UsuarioConectado.
    function conectarUsuario($idUsuario)
    {
        
    }
    
    //Método llamado cuando el usuario cierra sesión. Activa el evento: UsuarioDesconectado.
    function desconectarUsuario($idUsuario)
    {
        
    }
    
    
    //Método llamado por el administrador, para modificar información oficial del usuario.
    function modificarInfoUsuario($nuevaInfoUsuario)
    {
        
    }
    
    // Método llamado por el usuario (funcionario) con el objetivo de modificar su información de contacto.
    function modificarInfoContactoUsuario($nuevosDatos)
    {
        
    }
}

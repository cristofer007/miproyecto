<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Mensajes
 *
 * @author Pc
 */
class Mensajes {
    
    private $mensajes;
    
    public function __construct($mensajes)
    {
        //  FORMATO $mensajes??????
        //
        //
        //
        //
        //
        //
        
        $this->mensajes = array();
        $this->cargarMensaje($mensajes);
    }
    
    public function getMensajes()
    {
        return $this->mensajes;
    }
}

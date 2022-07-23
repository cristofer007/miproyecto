F<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Http\Controllers\ModuloForo;

/**
 * Description of Publicacion
 *
 * @author Pc
 */
class Publicacion {
    private $comentarios;
    
    public function __construct()
    {
        $this->comentarios = new Comentarios();
    }
    
    public function agregarComentario($nuevoComentario)
    {
        
    }
    
    public function eliminarComentario($idComentario)
    {
        
    }
    
    public function modificarComentario($comentarioModificado)
    {
        
    }
}

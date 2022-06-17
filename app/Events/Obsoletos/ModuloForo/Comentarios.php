<?php

namespace App\Http\Controllers\ModuloForo;

use Illuminate\Http\Request;

class Comentarios extends Controller
{
    private $comentarios;
    
    public function __construct()
    {
        $this->comentarios = array();
    }
    
    public function agregarComentario($datosComentario)
    {
        
    }
    
    public function eliminarComentario($idComentario)
    {
        
    }
    
    public function modificarComentario($idComentario, $comentarioModificado)
    {
        
    }
}
